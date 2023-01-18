<script>
   import {store} from '../../lib/store'
   import {browser} from '$app/environment'
   import {goto} from '$app/navigation'

   let user = {}
   store.subscribe(u => {
         user = JSON.parse(u)
      })

   // console.log('Home', user)
   // console.log('Home2', !user?.username)
   // if(!user?.username){
   //    console.log('Home3', user?.username)
   //    if(browser){
   //       goto(`/login`)
   //    }
   // }

</script>

<h1>Home</h1>
<!-- {#if user?.username}
   <h2>Welcome {user?.username}</h2>
{/if} -->
<h2>Welcome {user?.userData?.firstName} {user?.userData?.lastName}</h2>

<h3>Groups</h3>
<a href="/groups/create">Create</a>


