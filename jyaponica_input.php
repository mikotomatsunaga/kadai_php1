<?php


$str = '';
$data =[];

$file = fopen('data/data.txt','r');
flock($file,LOCK_EX);

if($file){
  while($line = fgets($file)){
    $str .= "<tr><td>{$line}</td></tr>";
    array_push($data,$line);
  }
}

flock($file, LOCK_UN);
fclose($file);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（入力画面）</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>

body{
    margin: 0 auto;
    width: 1000px;
    border: solid #000000 1px;
    border: black;
  }
form {
    width: 900px;
    margin: 0 auto;
}

.back_ground {
    background-color: white;
    opacity: 0.8;
}
.back_ground_border {
    border: solid 10px #57b857;/*線*/
}
header {
    border: 1px solid black;
    height: 30px;
    background-color: #000000;
}
h1 {
    margin: 0 auto;
    width: 1000px;
    font-size: 18px;
    text-align: center;
    color: #fff;

}
h3 {
    text-align: center;
    font-size: 18px;
}

footer{
  width: 1000px;
  margin: 0 auto;
  color: #fff;
  font-size: 18px;
  background-color: black;
  text-align: center;

}

ul{
  padding: 0;
  border-top: 1px solid #000000;
  display:table;  /* 定義 */
  table-layout: fixed;
  width:100%;
}
li{
  list-style-type:none;
  border: 1px solid #666;
  background-color: #FFF;
  display:table-cell;  /* 定義 */
  cursor: pointer;
}
li:hover{
  background: #0066CC;
  color:#fff;
}

/*ーーーーーーーーーーー*/
/*パネル*/
/*ーーーーーーーーーーー*/

.tab-panel {
  width: 900px;
  margin: 0 auto;
  text-align: center;
  font-weight: bold;
  margin-bottom: 15px;
}
.tab-panel p {
  margin: 0 auto;
  text-align: center;
  font-family: 'Anton', sans-serif;
  font-size: 30px;
}
.tab-group{
    display: flex;
    justify-content: center;
  }
.tab{
    flex-grow: 1;
    padding:5px;
    list-style:none;
    text-align:center;
    cursor:pointer;
  }
.panel-group{
    border-top:none;
  }
.panel{
    display:none;
  }
.tab.is-active{
    background:rgb(7, 119, 40);
    color:#FFF;
    transition: all 0.2s ease-out;
  }
.panel.is-show{
    display:block;
  }

/*ーーーーーーーーーーー*/
/*カード検索*/
/*ーーーーーーーーーーー*/
.searchForm{
    width: 500px;
    height: 40px;
    margin: 0 auto;
    margin-bottom: 20px;
    display: flex;
}
.searchForm input {
    width: 100px;
    height: 35px;
    margin-right: 130px;
    
}
.searchForm p {
    width: 270px;
    font-size: 22px;
    padding-top: 5px;
    text-align: right;
}

::placeholder {
  color:black;
  font-size: 1.2em;
  text-align: center;
}

.date input {
  width: 100px;
  height: 30px;
}


/*ーーーーーーーーーーー*/
/*ゴルフコース名*/
/*ーーーーーーーーーーー*/
select {
  width: 300px;
  height: 30px;
  font-size: 23px;
  margin-top: 10px;
  border: black 1px solid;
}
/*ーーーーーーーーーーー*/
/*コース情報*/
/*ーーーーーーーーーーー*/
.course_infomation input {
  width: 200px;
  height: 30px;
}



/*ーーーーーーーーーーー*/
/*スコアカード*/
/*ーーーーーーーーーーー*/
.score_card {
  margin: 0 auto;
  display: flex;
  margin-left: 20px;
  display: flex;
  padding-left: 10px;
  border: 1px black solid;
}
.score_card p {
  margin-left: 20px;
}


.YourScore input {
  width: 40px;
  height: 35px;
  margin-bottom: 4px;
}


.input_button  {
  width: 75px;
  height: 30px;
  margin: 0 auto;
  border: black solid 1px;
  font-size: large;
  margin-top: 10px;
}




</style>

<body>
  <header>
    <h1>PHP課題1</h1>
  </header>
  <div class="back_ground">
  <div class="back_ground_border">
  <div class="tab-panel">
      <!--タブ-->
      <p>Yardage Memory</p>
      <ul class="tab-group">
        <li class="tab tab-A is-active">SCORE CARD</li>
        <li class="tab tab-C">MY DATA</li>  
     </ul>
      <!--タブを切り替えて表示するコンテンツ-->
      <div class="panel-group">
        <!--パネルAここから-->
        <div class="panel tab-A is-show">
        <!--フォームここから-->
        <form action="jyaponica_create.php" method="post">
        <!--日付入力ここから-->
        <div class="date">
          <p>Date</p>
          <input type="date" name="date">
        </div>
        <!--日付入力ここまで-->
        <!--コース選択-->
        <div class="course_select">
          <div class="course_select">
             <p>Place</p>
             <select type="text" name="course_select">
               <option value="G,s National Golf Club(fukuoka)">G,s National Golf Club(fukuoka)</option>
               <option value="G,s Public Golf Course">G,s Public Golf Course</option>
               <option value="G,s Tenjin Country Club">G,s Tenjin Country Club</option>
             </select>
          </div>
        </div>
        <!--コース選択-->
        <!--コース情報入力-->
        <div class="course_infomation">
          <div class="Play_Fee">
             <p>Play Fee</p>
             <input type="text" name="play_fee" placeholder="1500yen">
          </div>
          <div class="Competition Name">
             <p>Competition Name</p>
             <input type="text" name="competition_name" placeholder="G,s CUP">
          </div>
          <div class="Fellow Competitor">
             <p>Fellow Competitor</p>
             <input type="text" name="competitor01" placeholder="Mr.Nakata">
             <input type="text" name="competitor02" placeholder="Mr.Takata">
             <input type="text" name="competitor03" placeholder="Mr.Nakanishi">
          </div>
          <div class="Tee_Time">
             <p>Tee Time</p>  
             <input type="time" name="tee_time">
          </div>
          <div class="Weather">
             <p>Weather</p>
             <input type="text" name="weather" placeholder="晴れ">
          </div>
          <div class="Temperature">
             <p>Temperature</p>
             <input type="text" name="temperature" placeholder="23.4度">
          </div>
          <div class="Wind">
             <p>Wind</p>
             <input type="text" name="wind" placeholder="南東1m">
          </div>
        </div>
         <!--コース情報入力-->->
         <!--スコアカードここから-->
          <div class="score_card">
            <div class="No.">
              <p>No.<br>1<br>2<br>3<br>4<br>4<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18<br></p>
            </div>
            <div class="Hcap">
              <p>Hcap<br>14<br>18<br>7<br>12<br>4<br>10<br>8<br>2<br>6<br>16<br>3<br>4<br>5<br>11<br>15<br>13<br>12<br>6<br></p>
            </div>
            <div class="Back">
              <p>Back(Yds)<br>390<br>370<br>170<br>335<br>170<br>445<br>540<br>425<br>525<br>500<br>200<br>340<br>400<br>390<br>460<br>570<br>340<br>190<br></p>
            </div>
            <div class="Front">
              <p>Front(Yds)<br>340<br>325<br>145<br>295<br>135<br>400<br>430<br>375<br>475<br>465<br>150<br>315<br>370<br>340<br>375<br>525<br>280<br>140<br></p>
            </div>
            <div class="Par">
              <p>Par<br>4<br>4<br>3<br>4<br>3<br>4<br>4<br>4<br>5<br>5<br>3<br>4<br>4<br>4<br>3<br>5<br>4<br>3<br></p>
            </div>
             <div class="YourScore">
              <p>YourScore</p>
                <div class="hole1">
                  <input type="text" name="hole01" size="5">
                </div>
                <div class="hole2">
                  <input type="text" name="hole02" size="5">
                </div>
                <div class="hole3">
                  <input type="text" name="hole03" size="5">
                </div>
                <div class="hole4">
                  <input type="text" name="hole04" size="5">
                </div>
                <div class="hole5">
                  <input type="text" name="hole05" size="5">
                </div>
                <div class="hole6">
                  <input type="text" name="hole06" size="5">
                </div>
                <div class="hole7">
                  <input type="text" name="hole07" size="5">
                </div>
                <div class="hole8">
                  <input type="text" name="hole08" size="5">
                </div>
                <div class="hole9">
                  <input type="text" name="hole09" size="5">
                </div>
                <div class="hole10">
                  <input type="text" name="hole10" size="5">
                </div>
                <div class="hole11">
                  <input type="text" name="hole11" size="5">
                </div>
                <div class="hole12">
                  <input type="text" name="hole12" size="5">
                </div>
                <div class="hole13">
                  <input type="text" name="hole13" size="5">
                </div>
                <div class="hole14">
                  <input type="text" name="hole14" size="5">
                </div>
                <div class="hole15">
                  <input type="text" name="hole15" size="5">
                </div>
                <div class="hole16">
                  <input type="text" name="hole16" size="5">
                </div>
                <div class="hole17">
                  <input type="text" name="hole17" size="5">
                </div>
                <div class="hole18">
                  <input type="text" name="hole18" size="5">
                </div> 
              </div>
            </div>
        <!--インプットボタンここから-->
        <div class="input_button"> 
        <button>submit</button>
        </div> 
         <!--インプットボタンここから-->
         <!--フォームここまで-->
         </form>
        </div>
      <!--パネルAここまで-->
      
      <!--パネルCここから-->
        <div class="panel tab-C">
          <div class="panel_c_wrap">
          <fieldset>
             <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
             <table>
             <thead>
             <tr>
             <th>入力結果</th>
             </tr>
             </thead>
             <tbody>
             <?= $str ?>
             </tbody>
             </table>
          </fieldset>
        　</div>
        </div>
      <!--パネルCここまで-->
   </div>
   <!--パネル大枠ここまで-->
   </div>
  </div>
</div>
  <footer>
    <small>Copyright © 2022 G,s Golf.co,.ltd. All Rights Resarved.</small>
  </footer>
  
  <script>
            const hoge = <?= json_encode($data) ?>;
            console.log(hoge); 


            document.addEventListener('DOMContentLoaded', function(){
            // タブに対してクリックイベントを適用
            const tabs = document.getElementsByClassName('tab');
            for(let i = 0; i < tabs.length; i++) {
            tabs[i].addEventListener('click', tabSwitch);
            }

            // タブをクリックすると実行する関数
            function tabSwitch(){
            // タブのclassの値を変更
            document.getElementsByClassName('is-active')[0].classList.remove('is-active');
            this.classList.add('is-active');
            // コンテンツのclassの値を変更
            document.getElementsByClassName('is-show')[0].classList.remove('is-show');
            const arrayTabs = Array.prototype.slice.call(tabs);
            const index = arrayTabs.indexOf(this);
            document.getElementsByClassName('panel')[index].classList.add('is-show');
            };
            });
  </script>
</body>
</html>

















<!-- /* <body>
  <div class="back_ground">
  <form action="jyaponica_create.php" method="post">
    <fieldset>
      <legend>textファイル書き込み型todoリスト（入力画面）</legend>
      <a href="jyaponica_read.php">一覧画面</a>
      <div>
        todo: <input type="text" name="todo">
      </div>
      <div>
        deadline: <input type="date" name="deadline">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
  </div>
</body> --> 
