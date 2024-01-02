const btnTggle = document.querySelector(".toggle-btn");

btnTggle.addEventListener("click",function(){
document.getElementById("sidebar").classList.toggle("active");
});
/*
var btn = document.getElementById("btn_prueba");
btn.addEventListener("click",myfuntion);
function myfuntion(){
    document.getElementById("prueba").setAttribute("class",'democlas');
}


    <script type="text/javascript">
        document.getElementById("btn_prueba").addEventListener("click",myfuntion);
        function myfuntion(){
            document.getElementById("prueba").setAttribute("class",'democlas');
        }
    </script>
*/
