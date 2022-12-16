jQuery(document).ready(function ($) {

    generateCSV = () => {
        // $.ajax({
        //     type: "POST",
        //     url: "methods/curl.php",
        //     data: { request: 'csv' },
        //     datatype: 'cvs',
        //     success: function (e) {
        //         console.log(e);
        //     }
        // });

        jQuery.ajax({
            url: "methods/curl.php",
            type: 'POST',
            data: { request: 'csv' },
            success: function (data) {
                const date = new Date();

                let day = date.getDate();
                let month = date.getMonth() + 1;
                let year = date.getFullYear();
                let currentDate = `${day}-${month}-${year}`;

                let downloadLink = document.createElement("a");
                let fileData = ['\ufeff' + data];

                let blobObject = new Blob(fileData, {
                    type: "text/csv;charset=utf-8;"
                });

                var url = URL.createObjectURL(blobObject);
                downloadLink.href = url;
                downloadLink.download = `usd_currency_rates_${currentDate}.csv`;

                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);

            }
        });
    }

    $.ajax({
        type: "POST",
        url: "methods/curl.php",
        data: { request: 'show' },
        datatype: 'json',
        success: function (data) {
            let counter = 1;
            data.map(function (value) {
                $('table').append(
                    `<tr>
                        <th scope="row">${counter++}</th>
                        <td>${value.currency}</th>
                        <td>${value.rate}</td>
                    </tr>`
                )
            })
        }
    });

});
