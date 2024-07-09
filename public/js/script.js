document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('camera');
    const canvas = document.getElementById('photoCanvas');
    const captureButton = document.getElementById('captureButton');
    const photoData = document.getElementById('photoData');
    const modalCapturedPhoto = document.getElementById('modalCapturedPhoto');
    const modalStudentInfo = document.getElementById('modalStudentInfo');
    const nameInput = document.getElementById('name');
    const classInput = document.getElementById('kelas');
    const kelasDropdownItems = document.querySelectorAll('#kelasDropdown .dropdown-item');
    const dropdownMenuLink = document.getElementById('dropdownMenuLink');

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

        // Tampilkan gambar yang diambil di dalam modal
        modalCapturedPhoto.src = imageData;
        modalStudentInfo.innerHTML = `Nama: ${nameInput.value}<br>Kelas: ${classInput.value}`;
    });

    // Dropdown selection
    kelasDropdownItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            classInput.value = item.getAttribute('data-value');
            dropdownMenuLink.textContent = item.textContent;
        });
    });
});