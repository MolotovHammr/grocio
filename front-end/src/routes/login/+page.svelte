<script>
    import {browser} from '$app/environment';
    import {goto} from '$app/navigation';
    import {store} from '../../lib/store';

    let userData = ''

    store.subscribe(u => {
        userData = u}
    )

    export let form;

    if(form?.success){

        store.update(u => {
            u = form?.user
            return u
        })
        if(browser){
            goto(`/home`) 
        }
        
    }
</script>

<h1>Login</h1>
<form method="POST" action="?/login">
    <div>
        <label for="username">Username</label>
        <input  name="username" id="username" />
        {#if form?.errorUsername}
            <div class="error">{form?.messageUsername}</div>
        {/if}
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
        {#if form?.errorPassword}
            <div class="error">{form?.messagePassword}</div>
        {/if}
    </div>
    <button formaction="?/login" type="submit">Login</button>
</form>