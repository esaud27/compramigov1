<?php
/**
 * Created by Hop.
 * User: Antonio
 * Date: 22/11/2015
 * Time: 08:37 PM
 * Description: Common footer for pages. Does not matter if the user is logged into the system
 */
?>

<!--  Footer general -->
<footer class="navbar-fixed-bottom footer">
    <div class="container footerWrap">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <h4>Conócenos</h4>
                <ul class="list-unstyled">
                    <li><a href="conocenos.php">¿Qué es CompAmigo?</a></li>
                    <li><a href="conocenos.php">¿Quienes somos?</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4">
                <h4>Ayuda y soporte</h4>
                <ul class="list-unstyled">
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/contact-support">Contacto de soporte</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-4">
                <h4>Redes sociales</h4>
                <ul class="list-unstyled">
                    <li><a href="https://www.facebook.com" target="_blank">
                            <i class="fa fa-facebook-square fa-2x" ></i>
                            Facebook
                        </a>
                    </li>
                    <li><a href="https://twitter.com" target="_blank">
                            <i class="fa fa-twitter-square fa-2x"></i>
                            Twitter <br>
                        </a>
                    </li>
                    <?php
                     // http://fontawesome.io
                    ?>
                    <!--
                    <li><a href="http://www.youtube.com/user/bootstrapbayofficial" target="_blank">
                            <i class="fa fa-youtube-square"></i>
                            YouTube
                        </a>
                    </li>
                    <li><a href="https://plus.google.com/+BootstrapbayThemes/posts" target="_blank">
                            <i class="fa fa-google-plus-square"></i>
                            Google+
                        </a>
                    </li>
                    -->
                </ul>
            </div>
        </div>
    </div>

    <div class="subFooter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-left">
© 2015 <a href="http://noscomedia.com/" target="_blank">ComprAmigo A.C.</a> /
                        <a href="/terms">Terminos y condiciones</a> /
                        <a href="/privacy">Politicas de privacidad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- End Footer general -->

<!-- jQuery -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="./bower_components/raphael/raphael-min.js"></script>
 <script src="./bower_components/morrisjs/morris.min.js"></script> 
<script src="./js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->