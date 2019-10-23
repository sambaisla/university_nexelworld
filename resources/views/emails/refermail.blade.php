<!--New template-->
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>

body{
    font-family:'Roboto', sans-serif;
    }

.ripple3{
    position:relative;
    overflow:hidden
    }

.ripple3:after{
    content:"";
    display:block;
    position:absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    pointer-events:none;
    background-image:radial-gradient(circle,#000 10%,transparent 10.01%);
    background-repeat:no-repeat;
    background-position:50%;
    transform:scale(10,10);
    opacity:0;
    transition:transform .5s,opacity 1s
    }

.ripple3:active:after{
    transform:scale(0,0);
    opacity:.2;
    transition:0s
    } 

</style>
</head>
<body>
<div style="font-family:'Roboto', sans-serif;font-size:13px;max-width:640px;margin:auto">
<div style="max-width:600px;margin:auto">
<div class="adM">
</div>
    <div style="text-align:center;margin:20px auto 0px;min-height:80px;background-color:#2C3810;max-width:640px;border:1px solid #0792c0;padding:20px 10%">
        <a href="https://acad.nexelworld.com" style="color:#ffffff;font-size:30px;text-decoration:none;">
            NEXEL ACADEMY
        </a>
        
    </div>
    <div style="background-color:#f7f7f7;border:1px solid #ddd;max-width:640px;margin:auto;">
    <section style="margin:30px;">
                    <h3 style="font-size:20px;">Dear {{ $name }},</h3>
				
					<div style="font-size:16px;line-height:1.6;">
						Welcome to Nexel family. We are happy to have you onboard. <br>
						For More information, Please <a href="https://www.acad.nexelworld.com" style="text-decoration: none;">visit</a> our website.<br>
					</div>
					<br>					
					<a href="https://www.acad.nexelworld.com" style="text-decoration:none;font-size:16px;padding:10px;box-sizing: border-box;border-radius:5px;background:#2C3810;color:#ffffff;">Visit Nexel</a>
					<br>
<br><hr>
<br>
				<div style="font-size:16px;line-height:1.6;">
					Find Investors, Mentors, Startups and Services for your growth.
				</div>
					<br>
					<a href="https://www.acad.nexelworld.com" style="text-decoration:none;font-size:16px;padding:10px;box-sizing: border-box;border-radius:5px;background:#2C3810;color:#ffffff;">Explore</a>
            
         </section>
         <section style="text-align:center">
         <div style="background-color:#333;margin:0px;padding:0px">
             <div style="margin-left:6%;margin-right:6%">
                 <div style="padding:20px 0px 30px 0px;text-align:center">
                     <p style="color:#e8e8e8;font-family:'Roboto', sans-serif;, sans-serif;font-size:12px;padding:0px;margin:0px">
						Follow us for more updates
					</p> 
                     <div style="display:inline-block;border-radius:100%;margin:12px 6px 0px 6px;padding:0">
                         <a href="https://www.facebook.com/nexelworld/" target="_blank">
                             <img src="https://i.imgur.com/zaCOpmA.png" alt="facebook" style="vertical-align:middle" width="30px" height="30px" class="CToWUd">
                         </a>
                     </div>
                     <div style="display:inline-block;border-radius:100%;margin:12px 6px 0px 6px;padding:0">
                         <a href="https://twitter.com/NexelWorld" target="_blank">
                             <img src="https://i.imgur.com/RYPyPAV.png" alt="facebook" style="vertical-align:middle" width="30px" height="30px" class="CToWUd">
                         </a>
                     </div>
                     <div style="display:inline-block;border-radius:100%;margin:12px 6px 0px 6px;padding:0">
                         <a href="https://www.linkedin.com/groups/10359513/" target="_blank">
                             <img src="https://i.imgur.com/TIOV0l5.png" alt="facebook" style="vertical-align:middle" width="30px" height="30px" class="CToWUd">
                         </a>
                     </div>
                      <p style="color:#ffffff;font-size:14px;line-height:21px;text-decoration:none;">
                          Powered by Nexel
                      </p>
                 </div>
             </div>
            </div>
         </section>
    </div>
</div>
</div>
</body>
</html>

<!--end-->