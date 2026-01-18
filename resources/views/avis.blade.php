<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis – HF Digital</title>
    <style>
        :root {
            --hf-green: #32C66C;
            --hf-dark: #0C3B55;
            --hf-cyan: #6AD7E1;
            --hf-lime: #A7E27B;
            --hf-white: #FFFFFF;
            --hf-gray: #F5F7FA;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: var(--hf-gray);
            color: var(--hf-dark);
        }

        h1 {
            text-align: center;
            color: var(--hf-green);
            margin: 40px 15px 20px;
            animation: slideDown 1s ease forwards;
            font-size: clamp(1.6rem, 3vw, 2rem);
        }

        .avis-container {
            width: 95%;
            max-width: 900px;
            margin: 0 auto 60px;
            background-color: var(--hf-white);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease forwards;
        }

        .btn {
            background-color: var(--hf-cyan);
            color: var(--hf-dark);
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
            width: 100%;
            max-width: 250px;
            margin: 10px auto;
            display: block;
        }

        .btn:hover {
            background-color: var(--hf-green);
            color: var(--hf-white);
        }

        .sort-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 15px;
            font-size: 14px;
            color: var(--hf-dark);
            gap: 8px;
        }

        .sort-container select {
            padding: 6px 10px;
            border-radius: 8px;
            border: 1px solid var(--hf-gray);
            font-size: 14px;
            flex-shrink: 0;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.4s ease;
            padding: 10px;
        }

        .modal-content {
            background-color: var(--hf-white);
            padding: 25px;
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
            position: relative;
            animation: slideUp 0.4s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: var(--hf-dark);
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid var(--hf-gray);
            font-size: 16px;
            background-color: #fafafa;
        }

        .stars {
            display: flex;
            margin-bottom: 10px;
            justify-content: center;
        }

        .stars span {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .stars span.hover,
        .stars span.selected {
            color: var(--hf-lime);
        }

        .avis-list {
            margin-top: 20px;
        }

        .avis-item {
            background-color: var(--hf-gray);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            animation: fadeInUp 0.5s ease forwards;
            position: relative;
        }

        @media (min-width: 600px) {
            .avis-item {
                flex-direction: row;
            }
        }

        .avis-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
            flex-shrink: 0;
            align-self: center;
        }

        .avis-content {
            flex: 1;
        }

        .avis-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
            gap: 5px;
        }

        .avis-name {
            font-weight: bold;
            font-size: 1rem;
        }

        .avis-date {
            font-size: 12px;
            color: #555;
        }

        .avis-message {
            margin-top: 5px;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    @include('layout.header_customer')

    <h1 style="margin-top: 150px;">Vos Avis sur HF Digital</h1>

    <div class="avis-container">
        <button class="btn" id="openModalBtn1">Poster un avis</button>

        <div class="sort-container">
            Trier par :
            <select id="sortSelect">
                <option value="date-desc">Date décroissante</option>
                <option value="date-asc">Date croissante</option>
                <option value="rating-desc">Note décroissante</option>
                <option value="rating-asc">Note croissante</option>
            </select>
        </div>

        <div class="avis-list" id="avisList"></div>
    </div>

    <!-- Modal -->
    <div class="modal" id="avisModal">
        <form action="{{ route('avis.submitAvis', ['slug' => $user->slug]) }}" method="POST">
            @csrf
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2 style="text-align:center; color:var(--hf-green); margin-bottom:15px;">Poster un avis</h2>

                <div class="stars" id="stars">
                    <select name="star" style="font-size: 30px; border:none; background:transparent; cursor:pointer;">
                        <option value="1">&#9733;</option>
                        <option value="2">&#9733;&#9733;</option>
                        <option value="3">&#9733;&#9733;&#9733;</option>
                        <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                    </select>
                </div>

                <input type="text" id="name" placeholder="Votre nom" name="name">
                <textarea id="message" rows="4" placeholder="Votre avis" name="description"></textarea>
                <button class="btn" id="submitAvis" type="submit">Envoyer</button>
            </div>
        </form>
    </div>

    @include('layout.footer')

    <script>
        const modal = document.getElementById('avisModal');
        const openBtn1 = document.getElementById('openModalBtn1');
        const closeBtn = document.getElementById('closeModal');
        const submitBtn = document.getElementById('submitAvis');
        const avisList = document.getElementById('avisList');
        const sortSelect = document.getElementById('sortSelect');
        let avisArray = [];

        openBtn1.addEventListener('click', () => modal.style.display = 'flex');
        closeBtn.addEventListener('click', () => modal.style.display = 'none');
        window.addEventListener('click', e => { if (e.target === modal) modal.style.display = 'none'; });

        function randomAvatar() {
            const avatars = [
                'https://i.pravatar.cc/60?img=1',
                'https://i.pravatar.cc/60?img=2',
                'https://i.pravatar.cc/60?img=3',
                'https://i.pravatar.cc/60?img=4',
                'https://i.pravatar.cc/60?img=5'
            ];
            return avatars[Math.floor(Math.random() * avatars.length)];
        }

        function renderAvis() {
            avisList.innerHTML = '';
            avisArray.forEach((avis) => {
                avisList.innerHTML += `
                    <div class="avis-item">
                        <img class="avis-avatar" src="${avis.avatar}" alt="Avatar">
                        <div class="avis-content">
                            <div class="avis-header">
                                <span class="avis-name">${avis.name}</span>
                                <span class="avis-date">${avis.date}</span>
                            </div>
                            <div class="avis-message">${'★'.repeat(avis.rating)}${'☆'.repeat(5 - avis.rating)}<br>${avis.message}</div>
                        </div>
                    </div>`;
            });
        }

        submitBtn.addEventListener('click', e => {
            const name = document.getElementById('name').value.trim();
            const message = document.getElementById('message').value.trim();
            const rating = document.querySelector('[name="star"]').value;
            if (!name || !message || !rating) {
                alert('Veuillez remplir tous les champs.');
                e.preventDefault();
                return;
            }
            const now = new Date();
            const dateStr = now.toLocaleDateString() + ' ' + now.toLocaleTimeString();
            avisArray.push({ name, message, rating: parseInt(rating), date: dateStr, avatar: randomAvatar() });
            renderAvis();
        });
    </script>
</body>

</html>
