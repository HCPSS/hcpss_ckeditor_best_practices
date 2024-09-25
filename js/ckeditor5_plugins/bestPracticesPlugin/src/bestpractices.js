import { Plugin } from 'ckeditor5/src/core';
import { throttle, isElement } from 'lodash-es';

export default class BestPractices extends Plugin {
  constructor(editor) {
    super(editor);
    this.set('messages', []);
    Object.defineProperties(this, {
      messages: {
        get() {
          return (this._getMessages());
        }
      }
    });
    this._config = {};
  }

  static get pluginName() {
    return 'BestPractices';
  }

  _search(item) {
    let messages = [];
    for (const child of item.getChildren()) {
      let href = child.getAttribute('linkHref');
      if (typeof href === 'string' || href instanceof String) {
        if (href.endsWith('.doc') || href.endsWith('.docx')) {
          messages.push('' +
            'You are linking directly to a Word Document. ' +
            '<a href="/hcpss-ckeditor-best-practices/tips#word" target="_blank">More ' +
            'information about accessible office documents.</a>');
        }
        if (child.data.startsWith('http://') || child.data.startsWith('https://')) {
          messages.push('' +
            'You are using a URL as link text. When you hyperlink content, make ' +
            'sure you link phrases that convey information about the destination. ' +
            '<a href="/hcpss-ckeditor-best-practices/tips#link" target="_blank">More ' +
            'information about good links.</a>');
        }
      }

      if (child.childCount) {
        messages = messages.concat(this._search(child));
      }
    }
    return messages;
  }

  _getMessages() {
    let root = this.editor.model.document.getRoot();
    return this._search(root);
  }

  init() {
    const editor = this.editor;
    this._config = editor.config.get('wordCount') || {};
    this._config.container = editor.sourceElement.parentElement;
    this._wrapper = document.createElement('div');
    this._wrapper.className = 'ck ck-best-practices';
    this._config.container.appendChild(this._wrapper);

    this._config.onUpdate = function (messages) {
      this.messages = ['this another message']
    }
    editor.model.document.on('change:data', throttle(this._refreshMessages.bind(this), 5000));
    if (typeof this._config.onUpdate == 'function') {
      this.on('update', (evt, data) => {
        const messages = this._search(this.editor.model.document.getRoot());

        this.set('messages', messages);
        this._config.onUpdate(data);
      });
    }
    if (isElement(this._config.container)) {
      this._bestPracticesContainer();
    }
  }

  /**
   * Creates a self-updating HTML element. Repeated executions return the same element.
   * The returned element has the following HTML structure:
   *
   * ```html
   * <div class="ck ck-best-practices">
   *   <ul>
   *     <li>You did bad :(</li>
   *   </ul>
   * </div>
   * ```
   */
  _bestPracticesContainer() {
    this.bind('_messages').to(this, 'messages', messages => {
      this._wrapper.innerHTML = '';
      const ul = document.createElement('ul');
      ul.className = 'messages messages--warning';
      for (const message of messages) {
        const li = document.createElement('li');
        li.innerHTML = message;
        ul.appendChild(li);
      }
      if (messages.length > 0) {
        this._wrapper.appendChild(ul);
      }
    });
  }

  _refreshMessages() {
    const root = this.editor.model.document.getRoot();
    const messages = this.messages = this._search(root);
    this.fire('update', messages);
  }
}
