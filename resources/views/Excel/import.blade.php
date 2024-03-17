<html>
    <form action="{{url('/import')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <input type="submit" value="Import data">
        <button><a href="{{url('export')}}">export</a></button>
    </form>
</html>