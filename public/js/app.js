/******/ (() => { // webpackBootstrap
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
window.Echo.channel('admin-notifications').listen('NewOrderEvent', function (event) {
  console.log(event);

  // إضافة الإشعار إلى القائمة
  var notificationList = document.querySelector('.main-notification-list');
  var notificationItem = document.createElement('div');
  notificationItem.classList.add('dropdown-item');
  notificationItem.innerHTML = "\n            <p><strong>".concat(event.user_name, "</strong> \u0642\u0627\u0645 \u0628\u0625\u0646\u0634\u0627\u0621 \u0637\u0644\u0628 \u062C\u062F\u064A\u062F. \u0625\u062C\u0645\u0627\u0644\u064A \u0627\u0644\u0637\u0644\u0628: ").concat(event.total, "</p>\n        ");
  notificationList.appendChild(notificationItem);

  // تحديث العدد عند إضافة إشعار جديد
  var notificationCount = document.getElementById('notification-count');
  notificationCount.innerText = parseInt(notificationCount.innerText) + 1;

  // تفعيل مؤشر التنبيه (pulse)
  var bellIcon = document.querySelector('.new .pulse');
  bellIcon.classList.add('active');
});
setInterval(function () {
  fetch('/notifications').then(function (response) {
    return response.text();
  }).then(function (data) {
    document.getElementById('notification-menu').innerHTML = data;
    document.getElementById('notification-count').innerText = document.querySelectorAll('.notification-item').length;
  });
}, 30000);
document.getElementById('notification-bell').addEventListener('click', function () {
  document.getElementById('notification-menu').classList.toggle('show');
});
/******/ })()
;