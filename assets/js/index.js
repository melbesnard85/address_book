$(document).ready(function () {
    let datatable = null;
    let selectedGroupId = 0;
    let g_ids = [];
    let selectedGroup = '';
    $("#group_tree").jstree({
        'core' : {
            'data' : {
                'url' : '?operation=get_node',
                'data' : function (node) {
                    return { 'id' : node.id };
                }
            },
            'check_callback' : true,
            'themes' : {
                'responsive' : false
            }
        },
        'force_text' : true,
        'plugins' : ['state','dnd','contextmenu','wholerow']
    })
    .on('delete_node.jstree', function (e, data) {
        $.get('?operation=delete_node', { 'id' : data.node.id })
            .fail(function () {
                data.instance.refresh();
            });
    })
    .on('create_node.jstree', function (e, data) {
        $.get('?operation=create_node', { 'id' : data.node.parent, 'position' : data.position, 'text' : data.node.text })
            .done(function (d) {
                data.instance.set_id(data.node, d.id);
            })
            .fail(function () {
                data.instance.refresh();
            });
    })
    .on('rename_node.jstree', function (e, data) {
        $.get('?operation=rename_node', { 'id' : data.node.id, 'text' : data.text })
            .fail(function () {
                data.instance.refresh();
            });
    })
    .on('move_node.jstree', function (e, data) {
        $.get('?operation=move_node', { 'id' : data.node.id, 'parent' : data.parent, 'position' : data.position })
            .fail(function () {
                data.instance.refresh();
            });
    })
    .on('copy_node.jstree', function (e, data) {
        $.get('?operation=copy_node', { 'id' : data.original.id, 'parent' : data.parent, 'position' : data.position })
            .always(function () {
                data.instance.refresh();
            });
    })
    .on('changed.jstree', function (e, data) {
        if(data && data.selected && data.selected.length) {
            $.get('?operation=get_content&id=' + data.selected.join(':'), function (d) {
                $('#data .default').text(d.content).show();
            });
        }
        else {
            $('#data .content').hide();
            $('#data .default').text('Select a file from the tree.').show();
        }
    })
    .on('select_node.jstree', function (e, data) {
        var selectedNode = $("#group_tree").jstree("get_selected");
        var node_info = $('#group_tree').jstree("get_node", selectedNode[0]);
        console.log(node_info.children_d)
        g_ids = node_info.children_d;
        if (g_ids) {
            if (g_ids[g_ids.length - 1] != selectedNode[0]) g_ids.push(selectedNode[0]);
            // set address title
            $("#tb_title")[0].innerText = node_info.text;
            selectedGroup = node_info.text;
            selectedGroupId = selectedNode[0];
            // draw datatable
            DrawTable(g_ids);
        }
    });

    function DrawTable(ids = [1]) {
        if (!datatable) {
            datatable = $('#address_tbl').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'responsive': true,
                'scrollY': 'auto',
                'ajax': {
                    'url': './services/index.service.php?group_ids=' + ids.join(','),
                },
                'order': [[0, 'desc']],
                'columns': [
                    { title: 'Id', data: 'id', visible: false, searchable: false },
                    { title: 'Name', data: 'name', width: 100 },
                    { title: 'First name', data: 'first_name' },
                    { title: 'Email', data: 'email' },
                    { title: 'Street', data: 'street', width: 150 },
                    { title: 'Zipcode', data: 'zipcode' },
                    { title: 'City', data: 'city' },
                    {
                        title: 'Action', width: 100, orderable: false, searchable: false, render: function (data, type, row) {
                            return `<a href="read.php?id=` + row['id'] + `" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                <a href="update.php?id=`+ row['id'] + `" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                <a href="delete.php?id=`+ row['id'] + `" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>`;
                        }
                    },
                ]

            });
        } else {
            datatable.ajax.url('./services/index.service.php?group_ids=' + ids.join(','));
            datatable.ajax.reload();
        }
    }

    $("#add_address").on('click', function () {
        location.href = "create.php?group_id=" + selectedGroupId;
    })

    $("#export_json").on('click', function () {
        $.ajax({
            type: "POST",
            url: "./services/getdata.service.php?group_ids=" + g_ids.join(','),
            dataType: 'JSON',
            success: function (response) {
                download(JSON.stringify(response), selectedGroup + ".json", "text/plain");
            }
        });
    })

    $("#export_xml").on('click', function () {
        $.ajax({
            type: "POST",
            url: "./services/getdata.service.php?group_ids=" + g_ids.join(','),
            dataType: 'JSON',
            success: function (response) {
                const xmlData = OBJtoXML(response);
                download(xmlData, selectedGroup + ".xml", "text/plain");
            }
        });
    })

    function download(text, name, type) {
        const a = document.createElement("a");
        const file = new Blob([text], { type: type });
        a.href = URL.createObjectURL(file);
        a.download = name;
        document.body.appendChild(a);
        a.click();
        a.remove();
    }

    function OBJtoXML(obj) {
        var xml = '';
        for (var prop in obj) {
            xml += obj[prop] instanceof Array ? '' : "<" + prop + ">";
            if (obj[prop] instanceof Array) {
                for (var array in obj[prop]) {
                    xml += "<" + prop + ">";
                    xml += OBJtoXML(new Object(obj[prop][array]));
                    xml += "</" + prop + ">";
                }
            } else if (typeof obj[prop] == "object") {
                xml += OBJtoXML(new Object(obj[prop]));
            } else {
                xml += obj[prop];
            }
            xml += obj[prop] instanceof Array ? '' : "</" + prop + ">";
        }
        var xml = `<?xml version="1.0" encoding="utf-8"?>` + xml.replace(/<\/?[0-9]{1,}>/g, '');
        return xml
    }
});