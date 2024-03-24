 // Get the notification icon and set its initial count to 0
 const notificationIcon = document.getElementById('notificationIcon');
 const count=notificationIcon.textContent;
 console.log(notificationIcon.textContent);
 let notificationCount = 0;

 // Function to update the notification count and display it on the icon
 function updateNotificationCount(count) {
     notificationCount = count;
     notificationIcon.innerHTML = `<span class="badge bg-danger">${notificationCount}</span>`;
 }
 updateNotificationCount(count); 


 document.addEventListener('DOMContentLoaded', function () {
    const notificationIcon = document.getElementById('notificationIcon');

    // Add click event listener to the notification icon
    notificationIcon.addEventListener('click', function () {
        // Hide the notification icon by setting its display property to "none"
        <a href="controllers/payadmin/updateStatus.controller.php"></a>
        notificationIcon.style.display = 'none';
        

    });
});