// References

const chordsSelectorInput = document.querySelector('#chords-selector-input')
const chordsList = document.querySelector('#chords-selector-list')
const selectedChordsList = document.querySelector('#chords-selector-selected')



// State

let selectedChordIds = [] // array of id's of selected chords




// Functions

chordsList.addEventListener('click', e => {
    let chordItem = e.target.closest('.select-item')

    if(chordItem != null) {
        handleSelectedChord(chordItem)
    }
})

function handleSelectedChord(chordItem) {
    let chordId = Number(chordItem.dataset.chordId)
    
    let isSelected = checkIfChordIdSelected(chordId)

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

    console.log(findChordElementById(chordId))

    let selectedChordElement = buildSelectedChordElement(
        chordId, 
        findNameOfChordElement(findChordElementById(chordId))
    )

    selectedChordsList.appendChild(selectedChordElement)
}

function removeSelectedChord(chordId) {
    selectedChordIds = selectedChordIds.filter(id => {
        return id != chordId
    })

    removeSelectedChordElement(chordId)
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
    let selectedIdsAtStart = JSON.parse(chordsSelectorInput.value)

    for(let chordId of selectedIdsAtStart) {
        addSelectedChord(chordId)
    }
    
    let allChords = chordsList.querySelectorAll('.select-item')
    allChords.forEach(chordItem => {
        if(checkIfChordIdSelected(Number(chordItem.dataset.chordId))) {
            setStylingOnChord(chordItem, true)
        }
    })
    console.log(`current selected array: ${selectedChordIds}`)
}

function buildSelectedChordElement(chordId, chordName) {
    // build simple block with chord name in it, and chord id as dataset data
    // return the element

    let chordElement = document.createElement('div')
    let chordNameElement = document.createElement('p')

    chordElement.classList.add('px-4', 'py-1', 'is-selected')
    chordNameElement.classList.add('font-bold', 'text-xl', 'text-blue-500')

    chordElement.dataset.chordId = chordId
    chordNameElement.innerText = chordName

    chordElement.appendChild(chordNameElement)

    return chordElement
}

function removeSelectedChordElement(chordId) {
    // search through elements for chordId in dataset, delete that element

    let elementToDelete = findSelectedChordElementsById(chordId)
    elementToDelete.remove()
}


// Utility

function checkIfChordIdSelected(chordId) {
    for(const selectedChordId of selectedChordIds) {
        if(selectedChordId == chordId) return true
    }

    return false
}

function findNameOfChordElement(chordElement) {
    return chordElement.firstElementChild.innerText
}

function findChordElementById(chordId) {
    let allChords = chordsList.querySelectorAll('.select-item')

    for(const chord of allChords) {
        if(Number(chord.dataset.chordId) == chordId) return chord
    }

    return null
}

function findSelectedChordElementsById(chordId) {
    let allChords = selectedChordsList.querySelectorAll('div')

    for(const chord of allChords) {
        if(Number(chord.dataset.chordId) == chordId) return chord
    }

    return null
}

// Init
initSelectedChords()