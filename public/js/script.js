document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('camera');
    const canvas = document.getElementById('photoCanvas');
    const captureButton = document.getElementById('captureButton');
    const photoData = document.getElementById('photoData');
    const capturedPhoto = document.getElementById('capturedPhoto');
    const studentInfo = document.getElementById('studentInfo');
    const nameInput = document.getElementById('name');
    const classInput = document.getElementById('kelas');

    // Akses kamera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.error('Error accessing camera: ', err);
        });

    // Tangkap foto
    captureButton.addEventListener('click', () => {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = canvas.toDataURL('image/png');
        photoData.value = imageData;

        // Tampilkan gambar yang diambil
        capturedPhoto.src = imageData;

        // Tampilkan nama dan kelas siswa
        studentInfo.innerHTML = `Nama: ${nameInput.value}<br>Kelas: ${classInput.value}`;
    });
});
