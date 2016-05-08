
<div class="container-content">
    <form action="<?=base_url('usuario/loginPost')?>" method="post" class="form">
        <div class="title"><h2>Login</h2></div>
        <div class="element-input">
            <label class="title"></label>
            <div class="item-cont">
                <input type="text" id="user" name="user" class="large" placeholder="Usuario"/>
            </div>
        </div>
        <div class="element-password" title="Contraseña">
            <label class="title"></label>
            <div class="item-cont">
                <input type="password" name="password" id="password"class="large" placeholder="Contraseña"/>
            <span class=""></span>
            </div>
        </div>
        <div class="element-checkbox" title="Recordar contraseña para próximas entradas">
            <label class="title"></label>
            <div class="column column1">
                <label>
                    <input type="checkbox" name="recordar" id="recordar" value="Recordar contraseña"/ >
                    <span>Recordar contraseña</span>
                </label>
            </div>
            <div class="element-input">
                <label class="title"></label>
                <div class="item-cont">
                    <span><a href="recuperar">&iquest;Has olvidado tus datos?</a></span>
                </div>
            </div>
            <span class="clearfix"></span>
        </div>
        <div class="submit"><input type="submit" value="Entrar"/></div>
    </form>
</div> <!--End of container-content-->
