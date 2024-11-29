/* global BalloonEditor */

/**
 * Editor
 */
const $editor = document.getElementById('editor')
if ($editor instanceof HTMLElement) {
  BalloonEditor.create($editor, {
    ckfinder: {
      uploadUrl: '/image/upload.php'
    }
  }).then(editor => {
    editor.editing.view.focus()
    const $form = document.querySelector('#main__form-post > form')
    $form.addEventListener('submit', e => {
      const data = document.createTextNode(editor.getData())
      document.querySelector('#main__form-post textarea[name=content]').appendChild(data)
    })
  })
}

/**
 * Readmore
 */
const $readmore = document.getElementById('readmore')
if ($readmore instanceof HTMLElement) {
  let page = 0
  $readmore.addEventListener('click', () => fetch('/?page=' + ++page, { method: 'get' }).then(async response => {
    const parser = new DOMParser()
    const doc = parser.parseFromString(await response.text(), 'text/html')
    const list = doc.querySelectorAll('.uk-container > .uk-list > li')
    if (list.length > 0) {
      Array.from(list).forEach(item => {
        document.querySelector('.uk-container').appendChild(item)
      })
    }
  }))
}
