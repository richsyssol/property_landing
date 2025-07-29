<?php 
include 'session_check.php';
include 'header.php';
?>
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    Analytics Dashboard
                    <div class="page-title-subheading">
                        This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div> 

    <p>hello</p>
     <!-- show logout session timer -->
     <div 
        id="session-timer" style="font-size: 18px; font-weight: bold; color: black;">
    </div>

</div>


<script>

// session time out script for auto logout

function updateSessionTimer() {
    fetch("session_check.php?fetch=time")
        .then(response => response.json())
        .then(data => {
            if (data.remaining_time <= 0) {
                window.location.href = "login.php?timeout=true"; // Auto logout when session expires
            } else {
                let hours = Math.floor(data.remaining_time / 3600);
                let minutes = Math.floor((data.remaining_time % 3600) / 60);
                let seconds = data.remaining_time % 60;
                
                document.getElementById("session-timer").textContent = 
                    `LogOut in: ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }
        })
        .catch(error => console.error("Error fetching session time:", error));
}

// Fetch and update session timer every second
setInterval(updateSessionTimer, 1000);

// Initial fetch
updateSessionTimer();



</script>


<?php 
include 'footer.php';
?>
                
