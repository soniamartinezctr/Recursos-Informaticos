<!--<div id="linea"></div>   
<div id="logo"><a href="#"><img src="../images/logotv.png"/></a></div>
      <div id="titulo"><h1>Recursos Informáticos</h1></div>     
       <div class="menu_nav">
        <ul>
          <li class="active"><a href="../index.php">Inicio</a></li>
          <li><a href="servidor.php">Servidores</a></li>
          <li><a href="servicio_red.php">Servicios de Red</a></li>
          <li><a href="bases_datos.php">Bases de Datos</a></li>
          <ul>
          <li><a href="contactoDB.php">Contacto BD</a></li>
          <ul>
          <li><a href="software.php">Software</a></li>
          <li><a href="sistemas_inf.php">Sistemas</a></li>
          <li><a href="detalle_servidor.php">Detalle Servidor</a></li>
          
          <li><a href="contactoServidor.php">Contacto Servidor</a></li>
          <li><a href="contactosistemas.php">Contacto Sistemas</a></li>
          <li><a href="softwareservidor.php">Software de Servidores</a></li>
        </ul>
      
      -->
      <div id="logosep"><a href="#"><img src="../images/sep.png"/></a></div>
           <div id="logo"><a href="#"><img src="../images/logotv.png"/></a></div>
           
      <div id="titulo"><h1>Recursos Informáticos</h1></div>    

<nav>
    <ul class="menu">
        <li><a href="#"><i class="icon-home"></i>Inicio</a>
            <!--   <ul class="sub-menu">
               <li><a href="#">Sub-Menu 1</a></li>
               <li><a href="#">Sub-Menu 2</a></li>
               <li><a href="#">Sub-Menu 3</a></li>
               </ul>-->
        </li>
        <li><a  href="servidor.php"><i class="icon-user"></i>Servidores</a>
            <ul class="sub-menu">
                <li><a href="softwareservidor.php">Software servidor</a></li>
                <li><a href="contactoservidor.php">Contacto Servidores</a></li>
                <li><a href="servicio_red.php">Servicio de Red</a></li>
            </ul>
        </li>
        <li><a  href="bases_datos.php"><i class="icon-camera"></i>Bases de Datos</a>
            <ul class="sub-menu">   
                <li><a href="contactobd.php">Contacto Bases de Datos</a></li>
            </ul>
            <!--  <ul class="sub-menu">
               <li><a href="#">Sub-Menu 1</a></li>
               <li><a href="#">Level 3 Menu</a>
                <ul>
                <li><a href="#">Sub-Menu 4</a></li>
                    <li><a href="#">Sub-Menu 5</a></li>
                    <li><a href="#">Sub-Menu 6</a></li>
                </ul>
               </li>
               </ul>-->
        </li>
        <li><a  href="software.php"><i class="icon-bullhorn"></i>Software</a>
                        <ul class="sub-menu">   
                            <!--<li><a href="contactosoftware.php">Contacto Software</a></li>-->
            </ul>
        </li>
        <li><a  href="sistemas_inf.php"><i class="icon-bullhorn"></i>Sistemas</a>
            <ul class="sub-menu">   
                <li><a href="contactosistemas.php">Contacto Sistemas</a></li>
            </ul>
        </li>
        <li><a  href="contacto.php"><i class="icon-envelope-alt"></i>Contacto</a></li>
    </ul>
</nav>
<a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menu</a>
     
<script>
    $(document).ready(function () {
        var touch = $('#touch-menu');
        var menu = $('.menu');

        $(touch).on('click', function (e) {
            e.preventDefault();
            menu.slideToggle();
        });

        $(window).resize(function () {
            var w = $(window).width();
            if (w > 767 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });

    });
</script>