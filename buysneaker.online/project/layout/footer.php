<div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="footer-contact">
                            <img src="../image/shop/<?=$infor['logoFooter']?>" alt="">
                            <p><?=$infor['slogan']?></p>
                            <ul class="address">
                                <li>
                                    <span class="fa fa-phone"></span>
                                    <?=$infor['phone']?>
                                </li>
                                <li>
                                    <span class="fa fa-envelope-o"></span>
                                    <?=$infor['email']?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <div class="footer-tweets">
                            <div class="footer-title">
                                <h3>Featured Facebook Posts</h3>
                            </div>
                            <div class="twitter-feed">
                                <div class="twitter-article">                  
                                    <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D330763512046490%26id%3D109281284194715&show_text=true&width=500" width="260" height="270" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>                                                                                                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="footer-support">
                            <div class="footer-title">
                                <h3>Our support</h3>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="my-account.php">Your Account</a></li>
                                    <li><a href="cart.php">Your Cart</a></li>
                                    <li><a href="wishlist.php">Your wishlist</a></li>
                                    <li><a href="faq.php">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="footer-info">
                            <div class="footer-title">
                                <h3>Our information</h3>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="#">Orders and Returns</a></li>
                                    <li><a href="policy.php">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="footer-copyright">
                            <p>Copyright &copy; 2021 <a href="https://buysneaker.online"> sneaker</a>. All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <a href="#" id="scrollUp"><i class="fa fa fa-arrow-up"></i></a>
        </footer>
        <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "109281284194715");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>