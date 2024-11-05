import { EditorProviderProps, JSONContent, BubbleMenuProps, Editor } from '@tiptap/react';
export { JSONContent, useCurrentEditor as useEditor } from '@tiptap/react';
import { Editor as Editor$1, Range } from '@tiptap/core';
export { Editor as EditorInstance } from '@tiptap/core';
import * as react from 'react';
import { FC, ReactNode } from 'react';

interface EditorRootProps {
    readonly children: ReactNode;
}
declare const EditorRoot: FC<EditorRootProps>;
type EditorContentProps = Omit<EditorProviderProps, "content"> & {
    readonly children?: ReactNode;
    readonly className?: string;
    readonly initialContent?: JSONContent;
};
declare const EditorContent: react.ForwardRefExoticComponent<Omit<EditorProviderProps, "content"> & {
    readonly children?: ReactNode;
    readonly className?: string | undefined;
    readonly initialContent?: JSONContent | undefined;
} & react.RefAttributes<HTMLDivElement>>;

interface EditorBubbleProps extends Omit<BubbleMenuProps, "editor"> {
    readonly children: ReactNode;
}
declare const EditorBubble: react.ForwardRefExoticComponent<EditorBubbleProps & react.RefAttributes<HTMLDivElement>>;

interface EditorBubbleItemProps {
    readonly children: ReactNode;
    readonly asChild?: boolean;
    readonly onSelect?: (editor: Editor) => void;
}
declare const EditorBubbleItem: react.ForwardRefExoticComponent<EditorBubbleItemProps & Omit<Omit<react.DetailedHTMLProps<react.HTMLAttributes<HTMLDivElement>, HTMLDivElement>, "ref">, "onSelect"> & react.RefAttributes<HTMLDivElement>>;

declare const EditorCommand: react.ForwardRefExoticComponent<Omit<{
    children?: react.ReactNode;
} & react.HTMLAttributes<HTMLDivElement> & {
    label?: string | undefined;
    shouldFilter?: boolean | undefined;
    filter?: ((value: string, search: string) => number) | undefined;
    defaultValue?: string | undefined;
    value?: string | undefined;
    onValueChange?: ((value: string) => void) | undefined;
    loop?: boolean | undefined;
    vimBindings?: boolean | undefined;
} & react.RefAttributes<HTMLDivElement>, "ref"> & react.RefAttributes<HTMLDivElement>>;
declare const EditorCommandList: react.ForwardRefExoticComponent<{
    children?: react.ReactNode;
} & react.HTMLAttributes<HTMLDivElement> & react.RefAttributes<HTMLDivElement>>;

interface EditorCommandItemProps {
    readonly onCommand: ({ editor, range, }: {
        editor: Editor$1;
        range: Range;
    }) => void;
}
declare const EditorCommandItem: react.ForwardRefExoticComponent<EditorCommandItemProps & Omit<{
    children?: react.ReactNode;
} & Omit<react.HTMLAttributes<HTMLDivElement>, "onSelect" | "value" | "disabled"> & {
    disabled?: boolean | undefined;
    onSelect?: ((value: string) => void) | undefined;
    value?: string | undefined;
    forceMount?: boolean | undefined;
} & react.RefAttributes<HTMLDivElement>, "ref"> & react.RefAttributes<HTMLDivElement>>;
declare const EditorCommandEmpty: react.ForwardRefExoticComponent<{
    children?: react.ReactNode;
} & react.HTMLAttributes<HTMLDivElement> & react.RefAttributes<HTMLDivElement>>;

export { EditorBubble, EditorBubbleItem, EditorCommand, EditorCommandEmpty, EditorCommandItem, EditorCommandList, EditorContent, type EditorContentProps, EditorRoot };
