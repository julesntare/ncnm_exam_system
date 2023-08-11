</div>
</div>
</div>
</body>

</html>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<script src="./assets/popupWindow/popupWindow.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('bdd6a9f7643a508c6c3d', {
    cluster: 'ap2'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    alert(data);
    // $.ajax('query/loadAppNotif.php', {
    //     type: 'POST',
    //     data: {
    //         myAppId: data.message
    //     },
    //     success: function(data, status, xhr) {
    //         let parsedData = JSON.parse(data);
    //         let arrParsedData = parsedData.res.split(" ");
    //         $("#notify_counter").html(arrParsedData[0]);
    //         if (arrParsedData[0] == 0) {
    //             $(".display .cont").html(
    //                 '<a><i class = "metismenu-icon" > </i>No Fresh Notification at the moment</a>'
    //             );
    //             return;
    //         }
    //         $(".display .cont").append(
    //             '<div class = "sec"><a href = "home.php?page=manage-applications"><div class = "txt">' +
    //             arrParsedData[2] +
    //             '</div> <div class = "txt sub" ><i>Approved</i></div> </a> </div>'
    //         );
    //     },
    //     error: function(jqXhr, textStatus, errorMessage) {}
    // });
});
</script>