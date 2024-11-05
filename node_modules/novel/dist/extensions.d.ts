import * as _tiptap_extension_horizontal_rule from '@tiptap/extension-horizontal-rule';
import * as tiptap_markdown from 'tiptap-markdown';
import * as _tiptap_extension_highlight from '@tiptap/extension-highlight';
import * as _tiptap_core from '@tiptap/core';
import { Extension, Node, Mark, Editor, Range } from '@tiptap/core';
export { InputRule } from '@tiptap/core';
import * as _tiptap_extension_placeholder from '@tiptap/extension-placeholder';
export { Color } from '@tiptap/extension-color';
import * as _tiptap_extension_image from '@tiptap/extension-image';
export { default as TiptapImage } from '@tiptap/extension-image';
export { default as TiptapLink } from '@tiptap/extension-link';
export { TaskItem } from '@tiptap/extension-task-item';
export { TaskList } from '@tiptap/extension-task-list';
export { default as TextStyle } from '@tiptap/extension-text-style';
export { default as TiptapUnderline } from '@tiptap/extension-underline';
export { default as StarterKit } from '@tiptap/starter-kit';
import { FC, RefObject, ReactNode } from 'react';
import { EditorState } from '@tiptap/pm/state';
import { KatexOptions } from 'katex';
export { default as CharacterCount } from '@tiptap/extension-character-count';
export { default as CodeBlockLowlight } from '@tiptap/extension-code-block-lowlight';
export { default as Youtube } from '@tiptap/extension-youtube';
export { default as GlobalDragHandle } from 'tiptap-extension-global-drag-handle';
import { GetReferenceClientRect } from 'tippy.js';

declare module "@tiptap/core" {
    interface Commands<ReturnType> {
        customkeymap: {
            /**
             * Select text between node boundaries
             */
            selectTextWithinNodeBoundaries: () => ReturnType;
        };
    }
}
declare const CustomKeymap: Extension<any, any>;

declare const ImageResizer: FC;

interface TwitterOptions {
    /**
     * Controls if the paste handler for tweets should be added.
     * @default true
     * @example false
     */
    addPasteHandler: boolean;
    HTMLAttributes: Record<string, any>;
    /**
     * Controls if the twitter node should be inline or not.
     * @default false
     * @example true
     */
    inline: boolean;
    /**
     * The origin of the tweet.
     * @default ''
     * @example 'https://tiptap.dev'
     */
    origin: string;
}
/**
 * The options for setting a tweet.
 */
type SetTweetOptions = {
    src: string;
};
declare module "@tiptap/core" {
    interface Commands<ReturnType> {
        twitter: {
            /**
             * Insert a tweet
             * @param options The tweet attributes
             * @example editor.commands.setTweet({ src: 'https://x.com/seanpk/status/1800145949580517852' })
             */
            setTweet: (options: SetTweetOptions) => ReturnType;
        };
    }
}
/**
 * This extension adds support for tweets.
 */
declare const Twitter: Node<TwitterOptions, any>;

interface MathematicsOptions {
    /**
     * By default LaTeX decorations can render when mathematical expressions are not inside a code block.
     * @param state - EditorState
     * @param pos - number
     * @returns boolean
     */
    shouldRender: (state: EditorState, pos: number) => boolean;
    /**
     * @see https://katex.org/docs/options.html
     */
    katexOptions?: KatexOptions;
    HTMLAttributes: Record<string, any>;
}
declare module "@tiptap/core" {
    interface Commands<ReturnType> {
        LatexCommand: {
            /**
             * Set selection to a LaTex symbol
             */
            setLatex: ({ latex }: {
                latex: string;
            }) => ReturnType;
            /**
             * Unset a LaTex symbol
             */
            unsetLatex: () => ReturnType;
        };
    }
}
/**
 * This extension adds support for mathematical symbols with LaTex expression.
 *
 * @see https://katex.org/
 */
declare const Mathematics: Node<MathematicsOptions, any>;

declare const UpdatedImage: _tiptap_core.Node<_tiptap_extension_image.ImageOptions, any>;

interface AIHighlightOptions {
    HTMLAttributes: Record<string, string>;
}
declare module "@tiptap/core" {
    interface Commands<ReturnType> {
        AIHighlight: {
            /**
             * Set a AIHighlight mark
             */
            setAIHighlight: (attributes?: {
                color: string;
            }) => ReturnType;
            /**
             * Toggle a AIHighlight mark
             */
            toggleAIHighlight: (attributes?: {
                color: string;
            }) => ReturnType;
            /**
             * Unset a AIHighlight mark
             */
            unsetAIHighlight: () => ReturnType;
        };
    }
}
declare const inputRegex: RegExp;
declare const pasteRegex: RegExp;
declare const AIHighlight: Mark<AIHighlightOptions, any>;
declare const removeAIHighlight: (editor: Editor) => void;
declare const addAIHighlight: (editor: Editor, color?: string) => void;

declare const Command: Extension<any, any>;
declare const renderItems: (elementRef?: RefObject<Element> | null) => {
    onStart: (props: {
        editor: Editor;
        clientRect: DOMRect;
    }) => false | undefined;
    onUpdate: (props: {
        editor: Editor;
        clientRect: GetReferenceClientRect;
    }) => void;
    onKeyDown: (props: {
        event: KeyboardEvent;
    }) => any;
    onExit: () => void;
};
interface SuggestionItem {
    title: string;
    description: string;
    icon: ReactNode;
    searchTerms?: string[];
    command?: (props: {
        editor: Editor;
        range: Range;
    }) => void;
}
declare const createSuggestionItems: (items: SuggestionItem[]) => SuggestionItem[];
declare const handleCommandNavigation: (event: KeyboardEvent) => true | undefined;

declare const PlaceholderExtension: _tiptap_core.Extension<_tiptap_extension_placeholder.PlaceholderOptions, any>;
declare const HighlightExtension: _tiptap_core.Mark<_tiptap_extension_highlight.HighlightOptions, any>;
declare const MarkdownExtension: _tiptap_core.Extension<tiptap_markdown.MarkdownOptions, tiptap_markdown.MarkdownStorage>;
declare const Horizontal: _tiptap_core.Node<_tiptap_extension_horizontal_rule.HorizontalRuleOptions, any>;

export { AIHighlight, type AIHighlightOptions, Command, CustomKeymap, HighlightExtension, Horizontal as HorizontalRule, ImageResizer, MarkdownExtension, Mathematics, PlaceholderExtension as Placeholder, type SuggestionItem, Twitter, UpdatedImage, addAIHighlight, createSuggestionItems, handleCommandNavigation, inputRegex, pasteRegex, removeAIHighlight, renderItems };
