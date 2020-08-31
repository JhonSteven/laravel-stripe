@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <div v-for="user in users" v-bind:key="user.id">@{{user.name}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
  el: '#app',
  name:"example",
  data () {
    return {
      users: []
    }
  },
  mounted () {
    axios
        .get('http://localhost:8000/users',{
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response =>{
            this.users = response.data.users;
        })
  }
})

</script>
@endsection
