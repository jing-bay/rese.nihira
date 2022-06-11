//メニューボタンのアニメーション
$(".menubtn").click(function () {
    $(this).toggleClass('active');
});

//詳細ページ：今日の日付をデフォルトで表示

const date = new Date();
date.setDate(date.getDate() + 1);

const yyyy = date.getFullYear();
const mm = ("0" + (date.getMonth() + 1)).slice(-2);
const dd = ("0" + date.getDate()).slice(-2);

document.getElementById("tomorrow").value = yyyy + '-' + mm + '-' + dd;
    
//詳細ページ：今から一番近い時間をデフォルトで表示

const time = new Date();
const hh = ("0" + (time.getHours() + 1)).slice(-2);

document.getElementById("currenttime").value = hh + ':' + '00';


//詳細ページ：入力終わったら自動で反映
window.addEventListener('DOMContentLoaded', function () {
    
    const date = document.getElementById("date");
    const time = document.getElementById("time");
    const number = document.getElementById("number");
    

    date.addEventListener("change",function(){
        let inputed_date = document.getElementById('inputed_date');//inputed_dateのidを検索して
        inputed_date.value = date.value
        });
    
    

    time.addEventListener("input", function () {
        let inputed_time = document.getElementById('inputed_time');//inputed_dateのidを検索して
        inputed_time.value = time.value;
    });
    
    
    number.addEventListener("input", function () {
        let inputed_number = document.getElementById('inputed_number');//inputed_dateのidを検索して
        inputed_number.value = number.value;
    });
})


