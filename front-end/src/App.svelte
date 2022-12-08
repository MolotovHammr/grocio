<script>
  import svelteLogo from './assets/svelte.svg'
  import Counter from './lib/Counter.svelte'
  import { Router, Route, Link } from "svelte-routing";

  export let url = "";

</script>

<Router url="{url}">
  <nav>
    <Link to="counter">Counter</Link>
  </nav>

  <div> Meep</div>
  <Route path="counter" component="{Counter}" />
</Router>

