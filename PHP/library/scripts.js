jQuery(document).ready(function ($) {

    $.ajax({
        type: "POST",
        url: "methods/curl.php",
        data: { request: 'show' },
        datatype: 'json',
        success: function (data) {
            console.log(data);
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
