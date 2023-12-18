(function (win, doc) {
  "use stript";

  if (doc.querySelector("#formCard")) {
    let MyformCard = doc.querySelector("#formCard");
    MyformCard.addEventListener("submit", (e) => {
      e.preventDefault();

      const card = PagSeguro.encryptCard({
        publicKey: doc.querySelector("#publicKey").value,
        number: doc.querySelector("#cardNumber").value,
        holder: doc.querySelector("#cardHolder").value,
        expMonth: doc.querySelector("#cardMonth").value,
        expYear: doc.querySelector("#cardYear").value,
        securityCode: doc.querySelector("#cardCvv").value,
      });

      const encrypted = card.encryptedCard;
      const hasErrors = card.hasErrors;
      const errors = card.errors;

      if (hasErrors) {
        console.log(errors);
      } else {
        doc.querySelector("#encryptedCard").value = encrypted;

        setTimeout(() => {
          MyformCard.submit();
        }, 500);
      }
    });
  }
})(window, document);
