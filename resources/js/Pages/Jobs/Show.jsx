import react from "react";
import { Head } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

export default function Job({ auth, job ,id}) {
  console.log(id);
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
      <div className=" mt-5 mx-10 mb-16 ">
        <h2 className="font-bold text-lg text-gray-600 dark:text-gray-200 ">
          {job.title}
        </h2>
        <p className="text-gray-500 dark:text-gray-100 ">
          This job pays {job.salary} per year.
        </p>
      </div>
      <a
        href={`/jobs/${id}/edit`}
        className="bg-white dark:bg-gray-800 mx-10 text-black border border-gray-300 rounded-lg shadow-sm py-2 px-4 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
      >
        {" "}
        Edit Job
      </a>

    </AuthenticatedLayout>
  );
}
