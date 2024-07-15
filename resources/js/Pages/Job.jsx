import react from "react";
import { Head } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

export default function Job({ auth, job }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Job
                </h2>
            }
        >
            <Head title="Job" />
            <div>
                <h2 className="font-bold text-lg">{job.title}</h2>
                <p>This job pays {job.salary} per year.</p>
            </div>
        </AuthenticatedLayout>
    );
}
