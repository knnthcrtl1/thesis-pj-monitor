const staticDevProjectMonitoring = "dev-project-monitorong-site-v1"
const assets = [
  "/",
  "/index.php",
  "/change_password.php",
  "/connection.php",
  "/edit_project.php",
  "/footer.php",
  "/header.php",
  "/login.php",
  "/logout-modal.php",
  "/logout.php",
  "/navbar.php",
  "/navigation.php",
  "/navs.php",
  "/view_dashboard.php",
  "/view_notification.php",
  "/view_project.php",
  "/js/script-edit-project.js",
  "/js/script-notification.js",
  "/js/script-project.js",
  "/js/script-user.js",
  "/tables/partial_engineer_in_project_tables.php",
  "/tables/partial_equipment_in_project_tables.php",
  "/tables/partial_foreman_in_project_tables.php",
  "/tables/partial_notification_tables.php",
  "/tables/partial_project_tables.php",
  "/tables/partial_task_inprogress_column.php",
  "/tables/partial_worker_in_project_tables.php",
  "/functions/function-user.php",
  "/assets/css/custom.css",
  "/assets/css/sb-admin-2.css",
  "/assets/css/sb-admin-2.min.css",
  "/assets/style.css",
  "/assets/logo1.png",
  "/assets/logo2.png",
  "/assets/logo3.png",
  "/assets/logo4.png",
]

self.addEventListener("install", installEvent => {
  installEvent.waitUntil(
    caches.open(staticDevProjectMonitoring).then(cache => {
      cache.addAll(assets)
    })
  )
})

self.addEventListener('fetch', function(e) {  
    e.respondWith(      caches.match(e.request).then(function(response) {  
    return response || fetch(e.request);
    })   
    );  
});

