<script>
            function toggleMenu(){
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');
                toggle.classList.toggle('active');
                main.classList.toggle('active');
                navigation.classList.toggle('active'); 
            }
        function openTab(evt, sectionName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                // alert(x[i]);
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            // alert(x.length);
            for (i = 0; i < x.length; i++) {
                // alert(tablinks[i]); 
                tablinks[i].classList.remove("border-red");
            }
            document.getElementById(sectionName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " border-red";
            }

    $(".dept").change(function () {
    //check if the selected option is others
    if (this.value === "other") {
        //toggle textbox visibility
        $("#other-text").toggle();
    }
});
            
</script>
