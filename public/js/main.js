function convertDate(date_str) {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
        "November", "December"
    ];
    temp_date = date_str.split("-");
    return months[Number(temp_date[1]) - 1] + " " + temp_date[2] + ", " + temp_date[0];
}

function fetchData(url){
    $.ajax({
        type: "GET",
        url: fetchURL,
        dataType: "json",
        success: function (response) {
            
        }
    });
}

function statusCode(statNum){
    switch (statNum) {
        case "0":
            return "Vacant";
            break;
        case "1":
            return "Occupied";
            break;
        case "2":
            return "Unpaid";
            break;
        case "3":
            return "Paid";
            break;
        case "4":
            return "Pending Balance";
            break;
        case "5":
            return "Unpaid Bills";
            break;
        case "6":
            return "Occupied";
            break;
        case "7":
            return "Occupied";
            break;
    }
}