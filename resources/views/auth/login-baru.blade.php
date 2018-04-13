<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <!-- Custom Theme files -->
        <link href="login/style.css" rel="stylesheet" type="text/css" media="all"/>
        
        <script src="login/jquery.min.js"></script>
        <script src="login/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default', //Types: default, vertical, accordion           
                    width: 'auto', //auto or any width like 600px
                    fit: true   // 100% fit in a container
                });
            });

        </script>	
        <!--script-->
        
        <link href="login/style-ku.css" rel="stylesheet" type="text/css" media="all"/>
    </head>

    <body>
            <div class="head">
                <div class="logo">
                    <a href=" {{ url('/register-baru') }} "><h4 style="margin-left: 5%; color: #ffffff;">Buat Akun Baru</h4></a>
                    <hr style="width: 90%; background-color: white;">
                    <a href="#"><h4 style="margin-left: 5%; color: #ffffff;">Lupa Password?</h4></a>
                </div>

                <div class="login">
                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <div class="login-top">
                                <form>
                                    <input type="text" class="username" placeholder="Username" required=""/>
                                    <input type="password" class="password" placeholder="Password" required=""/>		
                                </form>
                                <div class="login-bottom login-bottom1">
                                    <div class="submit">
                                        <input type="submit" value="LOGIN"/>
                                    </div>
                                    <div class="clear"></div>
                                </div>	
                            </div>
                            
                        </div>
                    </div>	
                </div>

                <div class="clear"></div>
            </div>	
        <center style="margin-top: 1%; color: #800000;">Custom Your Costume!</center>

        <div class="footer">
            <p>© 2015 Static Login Form. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
        </div>
</body>
</html> 