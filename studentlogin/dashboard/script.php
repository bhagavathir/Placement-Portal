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

            
            
var input = document.getElementById( 'file-upload' );
var infoArea = document.getElementById( 'file-upload-filename' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  // the change event gives us the input it occurred in 
  var input = event.srcElement;
  
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;
  
  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = 'File name: ' + fileName;
}
            
</script>