$(document).ready(function () {
    $('#myTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'responsive': true,
        'scrollY': 'auto',
        'ajax': {
            'url': './services/index.service.php'
        },
        'order': [[0, 'desc']],
        'columns': [
            { title: 'Id', data: 'id', visible: false },
            { title: 'Name', data: 'name' },
            { title: 'First name', data: 'first_name' },
            { title: 'Email', data: 'email' },
            { title: 'Street', data: 'street' },
            { title: 'Zipcode', data: 'zipcode' },
            { title: 'City', data: 'city' },
            { title: 'Groups', data: 'groups' },
            {
                title: 'Action', data: 'city', render: function (data, type, row) {
                    return `<a href="read.php?id=` + row['id'] + `" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                        <a href="update.php?id=`+ row['id'] + `" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                        <a href="delete.php?id=`+ row['id'] + `" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>`;
                }
            },
        ]

    });

    $("#export_json").on('click', function () {
        $.ajax({
            type: "POST",
            url: "./services/getdata.service.php",
            dataType: 'JSON',
            success: function (response) {
                download(JSON.stringify(response), "contacts.json", "text/plain");
            }
        });
    })

    $("#export_xml").on('click', function () {
        $.ajax({
            type: "POST",
            url: "./services/getdata.service.php",
            dataType: 'JSON',
            success: function (response) {
                const xmlData = OBJtoXML(response);
                download(xmlData, "contacts.xml", "text/plain");
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