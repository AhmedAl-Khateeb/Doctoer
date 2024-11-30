window.Echo.channel('admin-notifications')
    .listen('NewOrderEvent', (event) => {
        console.log(event);

        // إضافة الإشعار إلى القائمة
        const notificationList = document.querySelector('.main-notification-list');
        const notificationItem = document.createElement('div');
        notificationItem.classList.add('dropdown-item');
        notificationItem.innerHTML = `
            <p><strong>${event.user_name}</strong> قام بإنشاء طلب جديد. إجمالي الطلب: ${event.total}</p>
        `;
        notificationList.appendChild(notificationItem);

        // تحديث العدد عند إضافة إشعار جديد
        const notificationCount = document.getElementById('notification-count');
        notificationCount.innerText = parseInt(notificationCount.innerText) + 1;

        // تفعيل مؤشر التنبيه (pulse)
        const bellIcon = document.querySelector('.new .pulse');
        bellIcon.classList.add('active');
    });



setInterval(function() {
    fetch('/notifications')
        .then(response => response.text())
        .then(data => {
            document.getElementById('notification-menu').innerHTML = data;
            document.getElementById('notification-count').innerText = document.querySelectorAll('.notification-item').length;
        });
}, 30000);

document.getElementById('notification-bell').addEventListener('click', function() {
    document.getElementById('notification-menu').classList.toggle('show');
});



import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

const echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-app-key',
    cluster: 'your-app-cluster',
    encrypted: true
});

echo.channel('notifications')
    .listen('NotificationEvent', (event) => {
        document.getElementById('notifications_count').textContent = `: ${event.count}`;
    });
