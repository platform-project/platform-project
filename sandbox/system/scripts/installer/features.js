$(document).ready(function () {
    let features = [];

    function loadFeatures() {
        fetch('features.json')
            .then(response => response.json())
            .then(data => {
                features = data.features;
                renderFeatures();
            })
            .catch(error => {
                console.error('Error loading features:', error);
                alert('Failed to load features.json');
            });
    }

    function renderFeatures() {
        $('#feature-list').empty();
        features.forEach(feature => {
            console.log(feature.link);
            const featureDiv = $(`<div class="feature ${feature.installed ? 'feature-installed' : 'feature-not-installed'}" data-id="${feature.id}">
                <div>
                    <h3>${feature.name}</h3>
                    <p>${feature.description}</p>
                </div>
                <div>
                    <a class="toggle-feature button" href="${feature.link}">${feature.installed ? 'Open' : 'Manual Configure'}</a> <br />
                    <button class="toggle-feature">${feature.installed ? 'Uninstall' : 'Install Application'}</button>
                </div>
            </div>`);
            $('#feature-list').append(featureDiv);
        });
    }

    function toggleFeature(id) {
        const feature = features.find(f => f.id === id);
        if (feature) {
            feature.installed = !feature.installed;
            saveFeatures();
            renderFeatures();
        }
    }

    function addFeature(name, description) {
        const id = 'feature' + (features.length + 1);
        features.push({ id, name, description, installed: false });
        saveFeatures();
        renderFeatures();
    }

    function removeFeature(id) {
        features = features.filter(f => f.id !== id);
        saveFeatures();
        renderFeatures();
    }

    function saveFeatures() {
        // Simulating save with localStorage for demonstration purposes
        localStorage.setItem('features', JSON.stringify(features));
        console.log('Features saved to localStorage.');
    }

    $('#feature-list').on('click', '.toggle-feature', function () {
        const id = $(this).closest('.feature').data('id');
        toggleFeature(id);
    });

    $('#add-feature').click(function () {
        const name = prompt("Enter feature name:");
        const description = prompt("Enter feature description:");
        if (name && description) {
            addFeature(name, description);
        }
    });

    $('#remove-feature').click(function () {
        const id = prompt("Enter feature ID to remove:");
        if (id) {
            removeFeature(id);
        }
    });

    $('#refresh-features').click(function () {
        loadFeatures();
    });

    // Load initial features from localStorage if available
    const savedFeatures = localStorage.getItem('features');
    if (savedFeatures) {
        features = JSON.parse(savedFeatures);
        renderFeatures();
    } else {
        loadFeatures();
    }
});
