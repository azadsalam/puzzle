<?php echo form_open('admin_panel/authentication/login'); ?>
<fieldset>
    <label>Admin Login Panel</label><br/><br/>

    <label for="email">Email</label>
    <input name="email" type="text"  placeholder="Email"/><br/>
    <label for="password">Password</label>
    <input name="password" type="password"  placeholder="password"/>

        <input  type="submit" value="Login"/>
    </fieldset>
<?php echo form_close(); ?>