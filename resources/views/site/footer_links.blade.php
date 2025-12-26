<!--  Main jQuery  -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Swiper slider JS -->
    <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <!-- Counterup JS -->
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Isotope  JS -->
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- Magnific-popup  JS -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Marquee  JS -->
    <script src="{{asset('assets/js/jquery.marquee.min.js')}}"></script>
    <!-- Select2  JS -->
    {{-- <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script> --}}
    <!-- Select2  JS -->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script>
        const txts= document.querySelector(".animate-text").children,
	txtslen=txts.length;
	let index= 0;

	function animateText(){
		console.log(txts[index]);
		for (let i=0; i<txtslen; i++) {
			txts[i].classList.remove("text-in");
		}
		txts[index].classList.add("text-in");
		if(index == txtslen-1){
			index=0;
		}
		else{
			index++;
		}

		setTimeout(animateText, 3000);
	}
	window.onload=animateText;
    </script>


</body>

</html>