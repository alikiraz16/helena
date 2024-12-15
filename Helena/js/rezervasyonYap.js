const chairs = document.querySelectorAll('.chair');
let selectedChair = null;

document.addEventListener('DOMContentLoaded', () => {
    fetch('/Helena/api/getReservations.php')
        .then(response => response.json())
        .then(doluSandalyeler => {
            doluSandalyeler.forEach(id => {
                const chair = document.querySelector(`.chair[data-sandalye-id="${id}"]`);
                if (chair) {
                    chair.classList.add('occupied'); 
                    chair.style.pointerEvents = 'none';
                }
            });
        })
        .catch(error => console.error('Dolu sandalyeler yüklenemedi:', error));
});


chairs.forEach(chair => {
    chair.addEventListener('click', () => {
        if (chair.classList.contains('occupied')) {
            alert('Bu sandalye dolu. Lütfen başka bir sandalye seçin!');
            return;
        }

        if (selectedChair) {
            selectedChair.classList.remove('selected');
        }

        chair.classList.add('selected');
        selectedChair = chair;

        document.querySelector('.reservation-time').style.display = 'block';
    });
});

document.getElementById('reserve-button').addEventListener('click', () => {
    if (!selectedChair) {
        alert('Lütfen bir sandalye seçin!');
        return;
    }

    const sandalyeId = selectedChair.getAttribute('data-sandalye-id');
    const reservationDate = new Date().toISOString().split('T')[0];
    const duration = document.getElementById('reservation-duration').value;

    fetch('/Helena/api/reserve.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            sandalyeId,
            reservationDate,
            duration
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Rezervasyon başarıyla yapıldı!');
                location.reload(); // Sayfayı yenile
            } else {
                alert('Hata: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Rezervasyon hatası:', error);
            alert('Rezervasyon sırasında bir hata oluştu.');
        });
});