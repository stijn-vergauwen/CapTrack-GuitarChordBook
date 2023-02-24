"use strict"

export function initMultiselect(multiselect, selectedIds) {
    let selectedIdsAtStart = JSON.parse(getHiddenInput(multiselect).value)
    let multiselectElements = getMultiselectElements(multiselect)

    for(const itemId of selectedIdsAtStart) {
        const itemElement = findElementById(multiselectElements, itemId)
        selectItem(multiselect, itemElement, itemId, selectedIds)
    }
}

export function handleClick(multiselect, targetElement, selectedIds) {
    let itemId = Number(targetElement.dataset.itemId)
    let isSelected = selectedIds.find(e => e === itemId)

    if(!isSelected) {
        selectItem(multiselect, targetElement, itemId, selectedIds)
    }
    else {
        deselectItem(multiselect, targetElement, itemId, selectedIds)
    }

    console.log(`selected ids: ${selectedIds}`)
}

function selectItem(multiselect, itemElement, itemId, selectedIds) {
    selectedIds.push(itemId)

    toggleElementStyling(itemElement, true)

    getSelectedList(multiselect).appendChild(buildSelectedElement(
        itemId, 
        getElementText(itemElement)
    ))

    updateMultiselectInput(multiselect, selectedIds)
}

function deselectItem(multiselect, itemElement, itemId, selectedIds) {
    selectedIds.splice(selectedIds.indexOf(itemId), 1)

    toggleElementStyling(itemElement, false)
    
    let elementToDelete = findElementById(getSelectedElements(multiselect), itemId)
    elementToDelete.remove()

    updateMultiselectInput(multiselect, selectedIds)
}

function buildSelectedElement(id, text) {
    let element = document.createElement('div')
    let textElement = document.createElement('p')

    element.classList.add('px-4', 'py-1', 'is-selected')
    textElement.classList.add('font-bold', 'text-xl', 'text-primary-600')

    element.dataset.itemId = id
    textElement.innerText = text

    element.appendChild(textElement)

    return element
}

function toggleElementStyling(element, isSelected) {
    if(isSelected) {
        element.classList.add('is-selected')
    }
    else {
        element.classList.remove('is-selected')
    }
}

function updateMultiselectInput(multiselect, selectedIds) {
    getHiddenInput(multiselect).value = JSON.stringify(selectedIds)
}


// Utility

function getElementText(element) {
    return element.firstElementChild.innerText
}

function getSelectedList(multiselect) {
    return multiselect.querySelector('.selected-list')
}

function getHiddenInput(multiselect) {
    return multiselect.querySelector('.hidden-input')
}

function getMultiselectElements(multiselect) {
    return multiselect.querySelectorAll('.multiselect-list .select-item')
}

function getSelectedElements(multiselect) {
    return multiselect.querySelectorAll('.selected-list div')
}

function findElementById(elementArray, itemId) {
    for(const element of elementArray) {
        if(Number(element.dataset.itemId) === itemId) return element
    }
    return null
}