  //Start Tune while clicking on shuffle button
  var audio = new Audio(baseAssetUrl+'audios/sound.mp3');
  function updateTime() {
      var currentTime = new Date();
      var hours = currentTime.getHours();
      var minutes = currentTime.getMinutes();
      if (audio.paused) {
          audio.play();
      }
  }

  //CashOut Button functionality on hover
  $('#cashoutBtn').hover(function() {
      var FiftyPERCENT = 0.50; // 50% chance
      var FortyPERCENT = 0.40; // 50% chance
      if (Math.random() <= FiftyPERCENT) {
          var directionplace = 'top';
          if (Math.random() > 0.8) {
              directionplace = 'top';
          } else if (Math.random() > 0.6) {
              directionplace = 'left';
          } else if (Math.random() > 0.4) {
              directionplace = 'bottom';
          } else if (Math.random() > 0) {
              directionplace = 'left';
          }
          $('button#cashoutBtn').attr('style', 'margin-' + directionplace + ':300px;');

      } else if (Math.random() <= FortyPERCENT) {
        $('button#cashoutBtn').prop('disabled', true);
      } else {
        $('button#cashoutBtn').prop('disabled', false);
          //console.log('luckily');
      }

  });

  //After clicking credit move to account 
  $('#cashoutBtn').click(function() {
        //Session credits moved to account
        $.ajax({
            url: 'slotmachine/cashout',
            success: function(response) {
                jSonToArray = JSON.parse(response);
                toastr.success(jSonToArray.message);
                $('#amt_creadits').text(jSonToArray.availablecredits);
                $('.startBtn').prop('disabled', true); 
            }
        });
  });


  //Shuffle Button functionality while Clicking over it.
  $(".startBtn").click(function() {
      const myInterval = setInterval(updateTime, 500);
      $('.startBtn').prop('disabled', true);
      $('.items').html('<img src='+baseAssetUrl+'images/spin.gif />');
      let title = $(this).text();
     //Request to server
      $.ajax({
          url: 'slotmachine/getBlocksImage',
          success: function(response) {
              jSonToArray = JSON.parse(response);
              showBlockItems(jSonToArray.items, jSonToArray.current_credits, myInterval,jSonToArray.responseHTML);
          }
      });
  });

  function showBlockItems(fruits, credits, myInterval,message) {
      var baseUrl =  baseAssetUrl+'images/';
      setTimeout(function() {

          //Set First Block with server data  
          $('.items:eq(0)').html('<img src="' + baseUrl + fruits[0] + '.svg" />');

      }, 1000); // show first sign after 1 sec
      setTimeout(function() {
          //Set Second Block with server data
          $('.items:eq(1)').html('<img src="' + baseUrl + fruits[1] + '.svg" />');
      }, 2000); //show second sign after 2 sec
      setTimeout(function() {
          //Set Third Block with server data
          $('.items:eq(2)').html('<img src="' + baseUrl + fruits[2] + '.svg" />');

          //Update credits showing on the left top after all items display over roller
          $('#amt_creadits').text(credits);
          toastr.success(message);
          //Stop Audio after getting result over roller
          clearInterval(myInterval);
          audio.pause();

          //if credits 0 then disable shuffle button. Because without credit user cannot play the game
          if (credits == 0) {
            $('.startBtn').prop('disabled', true);
          } else {
            $('.startBtn').prop('disabled', false);
          }
      }, 3000); //show second sign after 3 sec
  }