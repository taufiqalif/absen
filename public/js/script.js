document.addEventListener('DOMContentLoaded', () => {
  const video = document.getElementById('camera');
  const canvas = document.getElementById('photoCanvas');
  const captureButton = document.getElementById('captureButton');
  const photoData = document.getElementById('photoData');

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
  });
});
