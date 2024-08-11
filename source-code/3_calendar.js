var acc = document.getElementsByClassName("accordion"); // βρίσκει όλες τις κλάσεις με το όνομα "accordion"
//https://www.w3schools.com/howto/howto_js_accordion.asp
for (i = 0; i < acc.length; i++) {
	//με το που πατήσω το "button" εκτέλεσε τον κώδικα για το κουμπί που πάτησα
  acc[i].addEventListener("click", function() {
	 //console.log(acc);
	 //console.log(acc.length);
    this.classList.toggle("active"); /* https://www.w3schools.com/js/js_this.asp στο παραπάνω αντικείμενο,
	σε αυτή την περίπτωση η συνάρτηση, εφάρμοσε στο button που πατήθηκε την css μορφοποίηση. */
    var panel = this.nextElementSibling;
	//σε περίπτωση που το button είναι ήδη active, κρύψε το από την σελίδα του φυλλομετρητή.
    if (panel.style.display === "block") {
	//αν ταυτίζεται με το block τότε κρύψε το div από τον χρήστη.
      panel.style.display = "none";
    } else {
	/*αλλιώς αν αν έχει οποιαδήποτε άλλη εμφάνιση το div εμφανισέ το σε όλη την σελίδα (καταλαμβάνοντας όλο
	το περιθώριο που της έχει δωθεί) αριστερά και δεξιά.*/
      panel.style.display = "block";  //https://www.w3schools.com/jsref/prop_style_display.asp
    }
  });
}