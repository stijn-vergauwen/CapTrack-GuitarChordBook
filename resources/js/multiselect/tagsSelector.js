"use strict"

import {initMultiselect, handleClick} from './multiselect.js'

// References

const multiselect = document.querySelector('#tags-multiselect')
const multiselectList = multiselect.querySelector('.multiselect-list')

// State

let selectedTagIds = []

// Functions

multiselectList.addEventListener('click', e => {
    let targetElement = e.target.closest('.select-item')

    if(targetElement != null) {
        handleClick(multiselect, targetElement, selectedTagIds)
    }
})

// Init

initMultiselect(multiselect, selectedTagIds)