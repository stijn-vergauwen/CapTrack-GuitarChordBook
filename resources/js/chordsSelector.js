// References

const chordsSelectorInput = document.querySelector('#chords-selector-input')
const chordsList = document.querySelector('#chords-selector-list')



// State

let selectedChordIds = [] // array of id's of selected chords




// Functions

chordsList.addEventListener('click', e => {
    let chordItem = e.target.closest('.chord-select-item');

    if(chordItem != null) {
        handleSelectedChord(chordItem)
    }
})

function handleSelectedChord(chordItem) {
    let chordId = Number(chordItem.dataset.chordId)
    
    let isSelected = checkSelectedChordId(chordId)

    if(isSelected) {
        removeSelectedChord(chordId)
    }
    else {
        addSelectedChord(chordId)
    }

    setStylingOnChord(chordItem, !isSelected)
    updateChordsSelectorInput()

    // console.log(`current selected array: ${selectedChordIds}`)
}

function addSelectedChord(chordId) {
    selectedChordIds.push(chordId)
}

function removeSelectedChord(chordId) {
    selectedChordIds = selectedChordIds.filter(id => {
        return id != chordId
    })
}

function setStylingOnChord(chordItem, addSelected) {
    if(addSelected) {
        chordItem.classList.add('is-selected')
    }
    else {
        chordItem.classList.remove('is-selected')
    }
}

function updateChordsSelectorInput() {
    chordsSelectorInput.value = JSON.stringify(selectedChordIds)
}

function initSelectedChords() {
    selectedChordIds = JSON.parse(chordsSelectorInput.value)
    
    let allChords = chordsList.querySelectorAll('.chord-select-item')
    allChords.forEach(chordItem => {
        if(checkSelectedChordId(Number(chordItem.dataset.chordId))) {
            setStylingOnChord(chordItem, true)
        }
    })
    console.log(`current selected array: ${selectedChordIds}`)
}


// Utility

function checkSelectedChordId(chordId) {
    let result = false
    selectedChordIds.forEach(id => {
        if(id == chordId) {
            result = true
            return
        }
    })
    return result
}

// Init
initSelectedChords()