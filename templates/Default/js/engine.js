var notice = document.createElement("div");

function getNotice (title, text) {
  notice.className = "notice";
  notice.innerHTML = "<img src='/templates/Default/images/info.png'><a href='#' class='closeButton' onclick='closeNotice(); return false;'>X</a><div class='title'>" + title + "</div><div class='text'>" + text + "</div>";
  document.body.appendChild(notice);
  $('.notice').fadeIn(600, function () {
    setTimeout(function () {
      closeNotice();
    }, 4000);
  });
}

function closeNotice () {
  $('.notice').fadeOut(600, function () {
    notice.parentNode.removeChild(notice);
  });
}

$('.register').on('click', function () {
  $('.register').attr("disabled", "disabled");
  sendRegisterData();
});

$('.login').on('click', function () {
  $('.login').attr("disabled", "disabled");
  sendLoginData();
});

$('.save-profile-edit').on('click', function () {
  $('.save-profile-edit').attr("disabled", "disabled");
  sendEditData();
});

function sendLoginData () {
  var data = $('.form-login').serialize();
  $.ajax({
    type: 'POST',
    url: '/core/actions/login.php',
    data: data,
    dataType: 'json',
    success: function (data) {
      getNotice('Уведомление', data['message']);
      if (data['success'] == true) {
        window.location.href = "/account";
      }
      setTimeout(function () {
        $('.login').removeAttr('disabled');
      }, 4000);
    },
    error: function (xhr, str) {
      alert('Возникла ошибка: ' + xhr.responceText);
    }
  });
}

function sendRegisterData () {
  var data = $('.form-register').serialize();
  $.ajax({
    type: 'POST',
    url: '/core/actions/register.php',
    data: data,
    dataType: 'json',
    success: function (data) {
      getNotice('Уведомление', data['message']);
      if (data['success'] == true) {
        setTimeout(function () {
          window.location.href = "/account";
        }, 2000);
      }
      setTimeout(function () {
        $('.register').removeAttr('disabled');
      }, 4000);
    },
    error: function (xhr, str) {
      alert('Возникла ошибка: ' + xhr.responceCode);
    }
  });
}

function sendEditData () {
  var data = $('.form-edit-profile').serialize();
  $.ajax({
    type: 'POST',
    url: '/core/actions/edit.php',
    data: data,
    dataType: 'json',
    success: function (data) {
      getNotice('Уведомление', data['message']);
      setTimeout(function () {
        $('.save-profile-edit').removeAttr('disabled');
      }, 4000);
    },
    error: function (xhr, str) {
      alert(xhr.responceCode);
    }
  });
}

var dataBlocks = [];
var searchBlocks = [];

function getBlocks () {
  $.get(
    "/core/actions/shop.php",
    {
      type: "all"
    },
    onAjaxSuccess
  );
}

var section = document.getElementById("section");

function onAjaxSuccess (data) {
  dataBlocks = JSON.parse(data);
  loadBlocks();
}

function loadBlocks () {
  for(var i = 0; i < dataBlocks.length; i++) {
    var row = document.createElement("div");
    row.className = "row";
    row.innerHTML = "<img src='/uploads/blocks/" + dataBlocks[i]['block_id'] + ".png' class='block-icon'><div class='text-block'>" + dataBlocks[i]['name'] + "</div><div class='price-block'>Цена: " + dataBlocks[i]['price'] + " руб. за " + dataBlocks[i]['count'] + " шт.</div><button class='buy-block' onclick='buyBlock(" + dataBlocks[i]['id'] + ");'>В корзину</button>";
    section.appendChild(row);
  }
  $('#preloader').find('i').fadeOut().end().delay(400).fadeOut('slow');
}

$( function() {
  $('div.section-row[onload]').trigger('onload');
});

$('.search-block').on('input', function () {
  
  if (this.value.length == 0) {
    section.innerHTML = '';
    searchBlocks = [];
    loadBlocks();
  } else if (this.value.length >= 4) {
    var n = 0;

    for(var i = 0; i < dataBlocks.length; i++) {
      if (dataBlocks[i]['name'].toLowerCase().indexOf(this.value.toLowerCase()) !== -1) {
        searchBlocks[n++] = dataBlocks[i];
      }
    }

    if (searchBlocks.length == 0) {
      section.innerHTML = '<div class="empty">Ничего не найдено :(</div>';
    } else {
      section.innerHTML = '';
      for (var i = 0; i < searchBlocks.length; i++) {
        var row = document.createElement("div");
        row.className = "row";
        row.innerHTML = "<img src='/uploads/blocks/" + searchBlocks[i]['block_id'] + ".png' class='block-icon'><div class='text-block'>" + searchBlocks[i]['name'] + "</div><div class='price-block'>Цена: " + searchBlocks[i]['price'] + " руб. за " + searchBlocks[i]['count'] + " шт.</div><button class='buy-block' onclick='buyBlock(" + searchBlocks[i]['id'] + ");'>В корзину</button>";
        section.appendChild(row);
      }
    }

  }
});

function buyBlock (id) {
  $.get(
    "/core/actions/shop.php",
    {
      type: "buy",
      block_id: id
    },
    onBuyResult
  );
}

function onBuyResult (data) {
  console.log(data);
  result = JSON.parse(data);
  getNotice('Уведомление', result['message']);
}