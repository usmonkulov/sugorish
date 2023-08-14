// (function($){
//     jQuery.fn.notification = function( options ){
//         options = $.extend(options, {
//             token: undefined,
//             production_mode: true
//         });
//         run = function(){
//             try {
//                 var url = '';
//                 if (options.production_mode)
//                     url = 'wss://my.gov.uz/ws?token=';
//                 else
//                     url = 'ws://my2.dev.gov.uz:8080?token=';
//
//                 var conn = new WebSocket(url + options.token);
//                 conn.onmessage = function (e) {
//                     if (e.data !== 'pong') {
//                         var data = JSON.parse(e.data);
//                         if (data.command == 'status-changed-notification') {
//                             var html = '<div data-key="' + data.data.id + '"><a href="/request/open/' + data.data.id + '?url=' + data.data.url + '">' + data.data.content + '</a></div>';
//                             newNotification(html);
//                         }
//                         if (data.command == 'traffic-offence-put-answer') {
//                             var html = '<div data-key="' + data.data.id + '"><a href="/request/open/' + data.data.id + '?url=' + data.data.url + '">' + data.data.content + '</a></div>';
//                             newNotification(html);
//                         }
//                         if (data.command == 'notaries-queue-notification') {
//                             var html = '<div data-key="' + data.data.id + '"><a href="/request/open/' + data.data.id + '?url=' + data.data.url + '">' + data.data.content + '</a></div>';
//                             newNotification(html);
//                         }
//                     }
//                 };
//                 conn.onopen = function (e) {
//                     // console.log("Connection established!");
//                     setInterval(function () {
//                         conn.readyState === conn.OPEN && conn.send('ping');
//                     }, 2000);
//                 };
//                 conn.onerror = function (err) {
//                     if (options.production_mode)
//                         console.log(err);
//                 }
//             } catch (e) {
//
//             }
//         };
//
//         function newNotification(content) {
//             var count = parseInt($('.notificationDropBtn .mainMenuBadge').html());
//             $('.notificationDropBtn .mainMenuBadge').html(++count).show();
//
//             var html = content + $('.notification_box .all-notifications .list-view').html();
//             $('.notification_box .all-notifications .list-view').html(html).parent().show();
//             $('.notification_box ._notificationEmpty').hide(500);
//
//         }
//
//         return this.each(run);
//     };
// })(jQuery);

function removeAllNotifications(elem) {
    $.ajax({
        url: elem.attr('href'),
        success: function(data) {
            if (!data)
                return;

            $('.notificationDropBtn .mainMenuBadge').html('0').hide();
            $('.notification_box .all-notifications').hide(500);
            $('.notification_box ._notificationEmpty').show(500);
            $('.notification_box .all-notifications .list-view div').remove();
        }
    });
}