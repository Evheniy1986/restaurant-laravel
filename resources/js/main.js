


// document.addEventListener("DOMContentLoaded", function () {
//     const dateSelect = document.getElementById("inputDate");
//     const timeSelect = document.getElementById("inputTime");
//
//     // Функция для округления времени до ближайшего 15-минутного интервала
//     function roundToNextQuarter(date) {
//         const minutes = date.getMinutes();
//         const roundedMinutes = Math.ceil(minutes / 15) * 15;
//         date.setMinutes(roundedMinutes, 0, 0);
//         return date;
//     }
//
//     // Функция для форматирования даты в формат DD.MM.YYYY
//     function formatDate(date) {
//         const day = String(date.getDate()).padStart(2, "0");
//         const month = String(date.getMonth() + 1).padStart(2, "0");
//         const year = date.getFullYear();
//         return `${day}.${month}.${year}`;
//     }
//
//     // Генерация дат на ближайшие 10 дней
//     const today = new Date();
//     for (let i = 0; i <= 10; i++) {
//         const date = new Date();
//         date.setDate(today.getDate() + i);
//
//         const option = document.createElement("option");
//         option.value = date.toISOString().split("T")[0]; // Формат для value: YYYY-MM-DD
//         option.textContent = formatDate(date); // Отображаемая дата: DD.MM.YYYY
//         dateSelect.appendChild(option);
//     }
//
//     // Функция для генерации времени
//     function generateTimeOptions() {
//         timeSelect.innerHTML = ""; // Очистка времени перед обновлением
//         const now = new Date();
//         const selectedDate = new Date(dateSelect.value);
//         const startTime =
//             selectedDate.toDateString() === today.toDateString()
//                 ? roundToNextQuarter(new Date())
//                 : new Date(selectedDate.setHours(11, 0, 0, 0));
//         const endTime = new Date(selectedDate.setHours(21, 0, 0, 0));
//
//         for (let time = new Date(startTime); time <= endTime; time.setMinutes(time.getMinutes() + 15)) {
//             const option = document.createElement("option");
//             option.value = time.toTimeString().slice(0, 5); // Формат HH:MM
//             option.textContent = option.value;
//             timeSelect.appendChild(option);
//         }
//     }
//
//     // Генерация времени при загрузке и изменении даты
//     dateSelect.addEventListener("change", generateTimeOptions);
//     generateTimeOptions(); // Инициализация
// });
//
// //   Поиск адресов
// document.getElementById('street-search').addEventListener('input', async function () {
//     const query = this.value.trim();
//     const resultsList = document.getElementById('results');
//     resultsList.innerHTML = ''; // Очищаем список перед новым запросом
//
//     if (query.length > 2) {
//         try {
//             const response = await fetch(
//                 `https://nominatim.openstreetmap.org/search?city=Сумы&street=${encodeURIComponent(query)}&format=json`
//             );
//
//             if (!response.ok) {
//                 console.error('Ошибка при выполнении запроса:', response.statusText);
//                 return;
//             }
//
//             const results = await response.json();
//
//             if (results.length === 0) {
//                 const noResultsLi = document.createElement('li');
//                 noResultsLi.textContent = 'Улицы не найдены';
//                 noResultsLi.style.color = '#999';
//                 resultsList.appendChild(noResultsLi);
//             } else {
//                 results.forEach(item => {
//                     const li = document.createElement('li');
//                     li.textContent = item.name;
//                     li.style.cursor = 'pointer';
//
//                     li.addEventListener('click', () => {
//                         document.getElementById('street-search').value = item.name;
//                         resultsList.innerHTML = ''; // Очищаем список после выбора
//                     });
//
//                     resultsList.appendChild(li);
//                 });
//             }
//         } catch (error) {
//             console.error('Ошибка запроса:', error);
//         }
//     }
// });
//
// document.addEventListener('click', function (event) {
//     const resultsList = document.getElementById('results');
//     const searchInput = document.getElementById('street-search');
//
//     // Если клик был не на поле поиска и не на списке результатов
//     if (!searchInput.contains(event.target) && !resultsList.contains(event.target)) {
//         resultsList.innerHTML = ''; // Закрываем список
//     }
// });
