
  <div class="logo">
    <h3 style="text-align: center">{{ config('app.name') }}</h3>
  </div>
  <table border='1' width='100%' cellpadding='3' cellspacing="0" style='border-collapse: collapse;font-size:12px'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Joined on</th>
        <th>No. of posts</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if(count($user->roles) < 1)
              No role(s) assigned
            @else
              @foreach($user->roles as $r)
                {{ $r->name }}
              @endforeach
            @endif
          </td>
          <td>{{ date('M j, Y H:i', strtotime($user->created_at)) }}</td>
          <td>{{ $user->posts()->count() }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <script type="text/php">
    if ( isset($pdf) ) {
        $font = Font_Metrics::get_font("helvetica", "bold");
    }
</script>
