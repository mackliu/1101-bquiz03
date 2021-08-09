<h2 class="ct" style="margin:5px;">線上訂票</h2>
<style>

    table tr:nth-child(odd){
        background:#aaa;
    }
    table tr:nth-child(even){
        background:#ccc;
    }
    table td:nth-child(1){
        padding:5px;
        text-align:center;
        width:60px;
    }
    table td select{
        width:100%;
    }

    table{
        width:400px;
        margin:auto;
        padding:20px;
        background:#eee;
        border:1px solid #999;
    }
</style>
<div id="menu">
    <table>
        <tr>
            <td>電影：</td>
            <td>
                <select name="movie" id="movie">
                    
                </select>
            </td>
        </tr>
        <tr>
            <td>日期：</td>
            <td>
                <select name="date" id="date"></select>
            </td>
        </tr>
        <tr>
            <td>場次：</td>
            <td>
                <select name="session" id="session"></select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="goBooking()">確定</button>
        <button>重置</button>
    </div>
</div>
<div id="booking" style="display:none">

</div>

<script>
getMovieList()


//當電影選單改變時執行上映日期檢查
$("#movie").on("change",()=>{
    getDateList()
})

//當日期選單改變時執行可訂單場次檢查
$("#date").on("change",()=>{
    getSessionList()
})


//取得電影列表-頁面載入時執行一次
function getMovieList(){
    let id='<?=$_GET['id']??'';?>';
    /* let url=location.href
        url=url.substr(url.indexOf('?')+1);
        url=url.split("&");
        url=url[1].split("=")
        console.log(url)
    let id=url[1]; */
    $.get("api/get_movie_list.php",{id},(list)=>{
        $("#movie").html(list)
        getDateList()
    })
    
}


function getDateList(){
    let movie=$("#movie").val()
    $.get("api/get_movie_days.php",{movie},(list)=>{
        //console.log(list)
        $("#date").html(list)
        getSessionList()
    })
}

function getSessionList(){
    let movie=$("#movie").val()
    let date=$("#date").val()
    $.get("api/get_date_session.php",{movie,date},(list)=>{
        //console.log(list)
        $("#session").html(list)
        
    })
}

function goBooking(){
    $("#menu").toggle()
    $("#booking").toggle()

    let movie=$("#movie").val()
    let date=$("#date").val()
    let session=$("#session").val()
    $.get("api/get_booking_seats.php",{movie,date,session},(seats)=>{
        $("#booking").html(seats)
    })


}

</script>