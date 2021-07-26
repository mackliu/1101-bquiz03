<style>

</style>
<div class="tab">
    <div style="height:320px;width:95%;background:#ccc;padding:5px">
        <button onclick="location.href='?do=new_movie'">新增電影</button>
        <hr>
        <div class="movie-body">

        </div>
    </div>
</div>
<script>
$(".sw").on("click", function() {
    let id = $(this).attr('id').split("-")
    console.log(id);
    $.post('api/sw.php', {
        id
    }, (res) => {
        //console.log(res)
        location.reload()
    })
})
</script>